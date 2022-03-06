<?php

namespace App\Exports;

use App\Models\Course;
use App\Models\Institution;
use App\Models\Pines;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class PinesExport implements FromView, WithEvents
{

    public function __construct($request) {
        $this->request = $request;
    }
    /**
    * @return \Illuminate\Support\View
    */
    public function view() : View
    {

        $request = $this->request;
        $colunms = [];
        if ($request->colunms) {
            $colunms = explode(',', $request->colunms);
        }
        $model = Pines::where('status', '!=', 'deleted')
            ->with(['printing', 'caduce', 'time']);
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
            // createConfigDB($name);
            if($name != null){
                config(['database.connections.mysql_instances.database' => $name]);
                $intitution = new Institution();
                $intitution->setConnection('mysql_instances');
                
                $intitution = $intitution->find($query->institution_id);
                $query->institution_name = $intitution ? $intitution->institution_name : 'No hay registro';
                if($intitution != null){
                    if (config('database.connections.'.$intitution->database)==null) {
                        createConfigDB($intitution->database);
                    }
                    // config(['database.connections.mysql_instances_institution.database' => $intitution->database]);
                    try {
                        $course = (new Course())
                            ->setConnection($intitution->database)
                            ->where('CourseId',$query->course_id)->first();

                        $query->course_name = $course ? $course->CourseName : 'No hay registro';
                    } catch (\Throwable $th) {
                        $query->institution_name = '';
                    }
                }
            }
        }
        $html= view('exports.pines.index')
            ->with('colunms', $colunms)
            ->with('items', $model);

        // dd($html);
        return $html;
    }

    /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                // $event->sheet->setAutoSize(true);
                for ($i= 'A'; $i <= 'G' ; $i++) { 
                    $event->sheet->getColumnDimension($i)->setAutoSize(true);
                }
            },
        ];
    }
}
