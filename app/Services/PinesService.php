<?php
namespace App\Services;

use App\Models\Account;
use App\Models\AutoConfigLabels;
use App\Models\Connections;
use App\Models\Course;
use App\Models\Institution;
use App\Models\Pines;
use App\Models\School;
use App\Models\User;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PinesService
{
    public function __construct() {
    }
    /**
     * Store a institution
     * @param Request $request
     */
    public function store(Request $request)
    {
        // Create Data
        for ($i=0; $i < $request->input('count'); $i++) { 
            $pin = Pines::create([
                'pin'               => time(),
                'platform_id'       => $request->input('platform_id'),
                'institution_id'    => $request->input('institution_id'),
                'course_book_id'    => $request->input('course_book_id'),
                'cicle_id'          => $request->input('cicle_id'),
                'created_at'        => Carbon::now(),
                'status'            => 'active'
            ]);
            $pin->pin = $pin->pin . $pin->id;
            $pin->save();
        }
    }
    /**
     * Administrator
     * @param Request $request
     */
    public function update(Request $request)
    {
        return false;
    }
    /**
     * Destroy
     * @param int $id
     */
    public function destroy(int $id)
    {
        $item = Pines::find($id);
        if($item == null){
            return false;
        }
        $item->status = 'deleted';
        $item->save() ;
        return true;
    }

    /**
     * Restore
     * @param int $id
     */
    public function restore(int $id)
    {
        $item = Pines::find($id);
        if($item == null){
            return false;
        }
        $item->status = 'active';
        $item->save() ;
        return true;
    }
    /**
     * Filter Data
     */
    public function getView(Request $request, $view = 'exports.pines.pdf')
    {
        $model = Pines::where('status', '!=', 'deleted')
            ->with(['printing', 'caduce', 'time']);

        $colunms = [];
        if ($request->colunms) {
            $colunms = explode(',', $request->colunms);
        }
        // dd($request);
        // if($request->cicle_id != 'all' && $request->cicle_id != null ){
        //     $model = $model->where('cicle_id', $request->cicle_id);
        // }
        if($request->book_id != 'all' && $request->book_id != null && $request->book_id != 'undefined' ){
            $model = $model->where('book_id', $request->book_id);
        }
        if($request->platform_id != 'all' && $request->platform_id != null && $request->platform_id != 'undefined'){
            $model = $model->where('platform_id', $request->platform_id);
        }
        if($request->institution_id != 'all' && $request->institution_id != null && $request->institution_id != 'undefined'){
            $model = $model->where('institution_id', $request->institution_id);
        }
        if($request->course_id != 'all' && $request->course_id != null && $request->book_id != 'undefined'){
            $model = $model->where('course_id', $request->course_id);
        }
        if($request->printing_id != 'all' && $request->printing_id != null && $request->printing_id != 'undefined'){
            $model = $model->where('printing_id', $request->printing_id);
        }
        
        if($request->status != 'all' && $request->status != null && $request->status != 'undefined'){
            $model = $model->where('status', $request->status);
        }

        if($request->start_date != 'all' && $request->start_date != null && $request->end_date != 'all' && $request->end_date != null ){
            $model = $model->whereDate('created_at', '>=',$request->start_date)->whereDate('created_at', '<=',$request->end_date);
        }
        
        $model = $model->with(['platform', 'cicle'])->get();

        foreach ($model as $key => $query) {
            $name = $query->platform ? $query->platform->master_db : null;
            createConfigDB($name);
            // dd($name, config('database.connections'));

            if($name != null){
                config(['database.connections.mysql_instances.database' => $name]);
                // $intitution = new Institution();
                // dd($intitution);
                // $intitution->setConnection('mysql_instances');
                
                $intitution = (new Institution())->setConnection('mysql_instances')->find($query->institution_id);
                $query->institution_name = $intitution ? $intitution->institution_name : 'No hay registro';
                $query->have_institution = $intitution ? 1 : 0;
                if($intitution != null){
                    if (config('database.connections.'.$intitution->database)==null) {
                        createConfigDB($intitution->database);
                    }
                    // config(['database.connections.mysql_instances_institution.database' => $intitution->database]);
                    try {
                        $course = (new Course())
                            ->setConnection($intitution->database)
                            ->where('CourseId',$query->course_id)->first();

                        $query->course_name = $course != null ? $course->CourseName : 'No hay registro';
                        $query->have_course = $course != null ? 1 : 0;
                    } catch (\Throwable $th) {
                        $query->institution_name = '';
                    }
                }
            }
        }
        $institutions = collect();
        $actives    = 0;
        $usaged     = 0;
        foreach ($model as $key => $item) {
            if ($item->status == 'active') {
                $actives += 1;
            }
            if ($item->status == 'used') {
                $usaged += 1;
            }
            if (!$item->have_institution) {
                continue;
            }
            
            if ($item->status == 'used') {
                $inst = $institutions->firstWhere('id', $item->institution_id);

                
                if ($inst == null) {
                    $courseData = collect();
                    if ($item->have_course) {
                        $courseData->push((object)[
                            'name'  => $item->course_name,
                            'count' => 1,
                            'id'    => $item->course_id,
                        ]);
                    }
                    $institutions->push((object)[
                        'name'          => $item->institution_name,
                        'id'            => $item->institution_id,
                        'total_used'    => $item->status == 'used' ? 1 : 0,
                        'courses'       => $courseData
                    ]);
                }else{
                    $inst->total_used += 1;
                    if ($item->have_course) {
                        $course = $inst->courses->firstWhere('id',$item->course_id);
                        if ($course == null) {
                            $inst->courses->push((object)[
                                'name'  => $item->course_name,
                                'count' => 1,
                                'id'    => $item->course_id,
                            ]);
                        }else{
                            $course->count +=1;
                        }
                    }
                }
            }

        }

        // dd($institutions);
        return view($view)
            ->with('items', $model)
            ->with('actives', $actives)
            ->with('usaged', $usaged)
            ->with('colunms', $colunms)
            ->with('institutions', $institutions);

    }
    /**
     * Show pdf
     */
    public function downloadPdf(Request $request)
    {
        // header('Content-type: application/pdf');
        $view = $this->getView($request)->render();

        $options_dompdf = [
            'dpi'                       => 180,
            'defaultFont'               => 'helvetica',
            'defaultPaperSize'          => 'A4',
            'defaultMediaType'          => 'print',
            'defaultPaperOrientation'   => 'landscape',
            'isHtml5ParserEnabled'      => true,
            'isPhpEnabled'              => true,
        ];

        $options = new Options();
        $options->set($options_dompdf);
        $options->setIsRemoteEnabled(true);
        $domPDF = new Dompdf($options);
        $domPDF->loadHtml(
            $view 
        );
        $domPDF->render();
        // $domPDF->output();
        $domPDF->stream( time() . '.pdf');
        // $domPDF->stream(time().'.pdf', ['Attachment' => 0, 'compress' => true]);

        // $domPDF->stream(time() . '.pdf', ['Attachment' => 0]);
    }
    
}
