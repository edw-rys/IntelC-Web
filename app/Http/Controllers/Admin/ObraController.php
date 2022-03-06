<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ObraDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Obra\StoreObraRequest;
use App\Http\Requests\Admin\Obra\UpdateObraRequest;
use App\Models\Icons;
use App\Models\Obra;
use App\Models\TypeObra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ObraController extends Controller
{
    /**
     * Constructor Alojamiento
     *
     */
    public function __construct()
    {
        $this->title = 'Obras';
        $this->singular_title = 'Obra';
        $this->action = 'obra';
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
            'show'          => 'admin.pages.'.$this->action.'.show'
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
     * @param ObraDataTable $dataTable
     * @return mixed
     */
    public function index(ObraDataTable $dataTable){
        
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
            ->with('icons', Icons::all())
            ->with('types', TypeObra::all())
            ->with('action', $this->action);
    }

     // TODO
    /**
     * Store new item into DB
     *
     * @param StoreObraRequest $request
     * @return JsonResponse
     */
    public function store(StoreObraRequest $request){
        
        canAccessTo($this->permissions->create);


        $path = $request->image->store('obras');

        if(Storage::disk('local')->exists($path)){
            $file = Storage::disk('local')->get($path);
            $filename = basename($path);
            Storage::disk('obras')->put($filename, $file);

            $request->merge([
                'image' => $filename,
            ]);
        }

        $item = Obra::create($request->all());
        $item->image = $request->input('image');
        $item->save();

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

        $item = Obra::find($id);

        if($item == null){
            return response()->json([
                'message'    => 'Ítem no encontrado'
            ],404);
        }

        return view($this->views->edit)
            ->with('item', $item)
            ->with('icons', Icons::all())
            ->with('types', TypeObra::all())
            ->with('route', 'admin.'.$this->action.'.update')
            ->with('action', $this->action);
    }
    
    /**
     * Update an item
     *
     * @param UpdateObraRequest $request
     * @return JsonResponse
     */
    public function update(UpdateObraRequest $request){

        canAccessTo($this->permissions->edit);

        $item = Obra::find($request->input('id'));
        
        if($item == null){
            return response()->json([
                'message'    => 'ítem no encontrado'
            ],404);
        }

        if ($request->image) {
            $path = $request->image->store('obras');
    
            if(Storage::disk('local')->exists($path)){
                $file = Storage::disk('local')->get($path);
                $filename = basename($path);
                Storage::disk('obras')->put($filename, $file);
                $item->image    = $filename;
            }
        }

        $item->title    = $request->input('title');

        $item->icon = $request->input('icon');
        $item->title = $request->input('title');
        $item->description = $request->input('description');
        $item->project = $request->input('project');
        $item->location = $request->input('location');
        $item->work_amount = $request->input('work_amount');
        $item->audit_amount = $request->input('audit_amount');
        $item->percentage = $request->input('percentage');
        $item->type_id = $request->input('type_id');
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

        $item = Obra::find($id);
        
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

        $item = Obra::find($request->input('id'));
        
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
