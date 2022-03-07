<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ScheduleDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Schedule\StoreParticipantScheduleRequest;
use App\Http\Requests\Admin\Schedule\StoreScheduleRequest;
use App\Http\Requests\Admin\Schedule\UpdateScheduleRequest;
use App\Models\Schedule;
use App\Models\ScheduleParticipants;
use App\Models\ScheduleType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ScheduleController extends Controller
{
    /**
     * Constructor Alojamiento
     *
     */
    public function __construct()
    {
        $this->title = 'Eventos';
        $this->singular_title = 'Evento';
        $this->action = 'schedule';
        $this->permissions  = (object) [
            'access'        => 'access_'.$this->action,
            'create'        => 'create_'.$this->action,
            'edit'          => 'edit_'.$this->action,
            'show'          => 'show_'.$this->action,
            'delete'        => 'delete_'.$this->action,
            'restore'       => 'restore_'.$this->action,
        ];

        $this->views        = (object) [
            'index'         => 'admin.pages.'.$this->action.'.index',
            'create'        => 'admin.pages.'.$this->action.'.create',
            'edit'          => 'admin.pages.'.$this->action.'.edit',
            'show'          => 'admin.pages.'.$this->action.'.show',
            'participants'   => 'admin.pages.'.$this->action.'.participants',
            
        ];

        $this->routes       = (object) [
            'index'         => 'admin.'.$this->action.'.index',
            'create'        => 'admin.'.$this->action.'.create',
            'edit'          => 'admin.'.$this->action.'.edit',
            'show'          => 'admin.'.$this->action.'.show'
        ];
    }


    /**
     * List all items
     *
     * @param ScheduleDataTable $dataTable
     * @return mixed
     */
    public function index(ScheduleDataTable $dataTable){
        
        canAccessTo($this->permissions->access);

        viewExist($this->views->index);

        return $dataTable->render($this->views->index,
            [
                'title' => $this->title, 
                'singular_title'=> $this->singular_title,
            ]
        );
    }

     // TODO
    /**
     * Create new item
     *
     * @return Factory|View
     */
    public function create(){

        canAccessTo($this->permissions->create);

        viewExist($this->views->create);

        return view($this->views->create)
            ->with('route', 'admin.'.$this->action.'.store')
            ->with('types', ScheduleType::all())
            ->with('action', $this->action);
    }

     // TODO
    /**
     * Store new item into DB
     *
     * @param StoreScheduleRequest $request
     * @return JsonResponse
     */
    public function store(StoreScheduleRequest $request){
        
        canAccessTo($this->permissions->create);

        
        if ($request->image != null ) {

            $path = $request->image->store('schedule');
    
            if(Storage::disk('local')->exists($path)){
                $file = Storage::disk('local')->get($path);
                $filename = basename($path);
                // dd($path,$filename, basename($path),  $request->input('image'));
                Storage::disk('schedule')->put($filename, $file);
    
                $request->merge([
                    'image' => $filename,
                ]);
            }
        }

        $item = Schedule::create($request->all());

        return response()->json([
            'message' => 'Creado',
            'action'  => 'create',
            'id'    => $item->id
        ]);
    }
    
    /**
     * Edit an item
     *
     * @param $id
     * @return JsonResponse|View
     */
    public function edit($id){
        
        canAccessTo($this->permissions->edit);

        viewExist($this->views->edit);

        $item = Schedule::find($id);

        if($item == null){
            return response()->json([
                'message'    => 'Ítem no encontrado'
            ],404);
        }

        return view($this->views->edit)
            ->with('item', $item)
            ->with('types', ScheduleType::all())
            ->with('route', 'admin.'.$this->action.'.update')
            ->with('action', $this->action);
    }

    /**
     * Store new item into DB
     *
     * @param StoreParticipantScheduleRequest $request
     * @return JsonResponse
     */
    public function participantsStore(StoreParticipantScheduleRequest $request){
        
        canAccessTo($this->permissions->create);

        $item = ScheduleParticipants::create($request->all());

        return response()->json([
            'message' => 'Creado',
            'action'  => 'create',
            'id'    => $item->id
        ]);
    }

    public function participantsDelete($id)
    {
        canAccessTo($this->permissions->delete);

        $item = ScheduleParticipants::find($id);
        
        if($item == null){
            return response()->json([
                'message'    => 'ítem no encontrado'
            ],404);
        }

        $item->status = 'deleted';
        $item->save();

        return response()->json([
            'message' => 'Eliminado',
            'action'  => 'destroy',
            'status'  => 'success'
        ]);
    }

    /**
     * Edit an item
     *
     * @param $id
     * @return JsonResponse|View
     */
    public function participants($id){
        
        canAccessTo($this->permissions->edit);

        viewExist($this->views->participants);

        $item = Schedule::with('participants')
            ->find($id);

        if($item == null){
            return response()->json([
                'message'    => 'Ítem no encontrado'
            ],404);
        }

        return view($this->views->participants)
            ->with('types', ScheduleType::all())
            ->with('item', $item)
            ->with('route', 'admin.'.$this->action.'.participants.store')
            ->with('action', $this->action);
    }
    
    /**
     * Update an item
     *
     * @param UpdateScheduleRequest $request
     * @return JsonResponse
     */
    public function update(UpdateScheduleRequest $request){

        canAccessTo($this->permissions->edit);

        $item = Schedule::find($request->input('id'));
        
        if($item == null){
            return response()->json([
                'message'    => 'ítem no encontrado'
            ],404);
        }
        
        if ($request->image != null ) {
            
            $path = $request->image->store('schedule');
    
            if(Storage::disk('local')->exists($path)){
                $file = Storage::disk('local')->get($path);
                $filename = basename($path);
                Storage::disk('schedule')->put($filename, $file);
    
                $item->image = $filename;
            }
        }

        $item->title = $request->input('title');
        $item->start_date = $request->input('start_date');
        $item->end_date = $request->input('end_date');
        $item->description = $request->input('description');
        $item->location = $request->input('location');
        $item->number_seats = $request->input('number_seats');
        $item->available_seats = $request->input('available_seats');
        $item->phone = $request->input('phone');
        $item->email = $request->input('email');
        $item->website = $request->input('website');
        $item->schedule_type_id = $request->input('schedule_type_id');
        $item->save();

        return response()->json([
            'message' => 'Editado',
            'action'  => 'edit',
            'id'    => $item->id
        ]);
    }
   
    /**
     * Destroy an item
     *
     * @param DestroyCourseRequest $request
     * @return JsonResponse
     */
    public function destroy( $id){

        canAccessTo($this->permissions->delete);

        $item = Schedule::find($id);
        
        if($item == null){
            return response()->json([
                'message'    => 'ítem no encontrado'
            ],404);
        }

        $item->status = 'deleted';
        $item->save();

        return response()->json([
            'message' => 'Eliminado',
            'action'  => 'destroy',
            'status'  => 'success'
        ]);
    }
     /**
     * Destroy an item
     *
     * @param RestoreCourseRequest $request
     * @return JsonResponse
     */
    public function restore(Request $request){

        canAccessTo($this->permissions->delete);

        $item = Schedule::find($request->input('id'));
        
        if($item == null){
            return response()->json([
                'message'    => 'Ítem no encontrado'
            ],404);
        }

        $item->status = 'active';
        $item->save();

        return response()->json([
            'message' => 'Restaurado',
            'action'  => 'restore',
            'status'  => 'success'
        ]);
    }
}
