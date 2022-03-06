<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\DirectionsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Directions\StoreDirectionsRequest;
use App\Http\Requests\Admin\Directions\UpdateDirectionsRequest;
use App\Http\Requests\Admin\Directions\UploadFileDirectionsRequest;
use App\Models\Icons;
use App\Models\Directions;
use App\Models\DirectionsItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DirectionsController extends Controller
{
    /**
     * Constructor Alojamiento
     *
     */
    public function __construct()
    {
        $this->title = 'Direcciones';
        $this->singular_title = 'Dirección';
        $this->action = 'directions';
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
     * @param DirectionsDataTable $dataTable
     * @return mixed
     */
    public function index(DirectionsDataTable $dataTable){
        
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
            // ->with('icons', Icons::all())
            ->with('action', $this->action);
    }

     // TODO
    /**
     * Store new item into DB
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(StoreDirectionsRequest $request){
        
        canAccessTo($this->permissions->create);

        $path = $request->image->store('directions');

        if(Storage::disk('local')->exists($path)){
            $file = Storage::disk('local')->get($path);
            $filename = basename($path);
            // dd($path,$filename, basename($path),  $request->input('image'));
            Storage::disk('directions')->put($filename, $file);

            $request->merge([
                'image' => $filename,
            ]);
        }

        $request->merge([
            'short_description' => $request->input('title')
        ]);

        $item = Directions::create($request->all());
        $item->image = $request->input('image');
        $item->save();

        return response()->json([
            'message' => 'Creado',
            'action'  => 'create',
            'id'    => $item->id
        ]);
    }
    /**
     * Upload files
     * @param UploadFileDirectionsRequest
     */
    public function updoadFiles(UploadFileDirectionsRequest $request)
    {
        $path = $request->file->store('directions');

        if(Storage::disk('local')->exists($path)){
            $file = Storage::disk('local')->get($path);
            $filename = basename($path);
            Storage::disk('directions')->put($filename, $file);

            DirectionsItems::create([
                'service_id'  => $request->input('service_id'),
                'description' => $request->input('description'),
                'image'             => $filename,
                
            ]);
            return response()->json([
                'message' => 'Imagen subida',
                'action'  => 'create',
            ]);
        }
        return response()->json([
            'message' => 'Error al subir el archivo',
            'action'  => 'store',
        ],400);
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

        $item = Directions::with('items')->find($id);

        if($item == null){
            return response()->json([
                'message'    => 'Ítem no encontrado'
            ],404);
        }

        return view($this->views->edit)
            ->with('item', $item)
            ->with('route_upload', 'admin.'.$this->action.'.store.upload')
            ->with('icons', Icons::all())
            ->with('route', 'admin.'.$this->action.'.update')
            ->with('action', $this->action);
    }
    
    /**
     * Update an item
     *
     * @param UpdateDirectionsRequest $request
     * @return JsonResponse
     */
    public function update(UpdateDirectionsRequest $request){

        canAccessTo($this->permissions->edit);

        $item = Directions::find($request->input('id'));
        
        if($item == null){
            return response()->json([
                'message'    => 'ítem no encontrado'
            ],404);
        }

        if ($request->image) {
            $path = $request->image->store('directions');
    
            if(Storage::disk('local')->exists($path)){
                $file = Storage::disk('local')->get($path);
                $filename = basename($path);
                Storage::disk('directions')->put($filename, $file);
                $item->image    = $filename;
            }
        }
        
        $item->title    = $request->input('title');

        $item->short_description= $request->input('short_description');
        $item->description= $request->input('description');
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
    public function removeItem($id)
    {
        $item = DirectionsItems::find($id);
        
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
     * @param DestroyCourseRequest $request
     * @return JsonResponse
     */
    public function destroy( $id){

        canAccessTo($this->permissions->delete);

        $item = Directions::find($id);
        
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

        $item = Directions::find($request->input('id'));
        
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
