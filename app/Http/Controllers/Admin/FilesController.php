<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\FilesDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Files\StoreFilesRequest;
use App\Http\Requests\Admin\Files\UpdateFilesRequest;
use App\Http\Requests\Admin\Files\UploadFileRequest;
use App\Models\Icons;
use App\Models\Files;
use App\Models\GroupFile;
use App\Models\TypesFiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FilesController extends Controller
{
    /**
     * Constructor Alojamiento
     *
     */
    public function __construct()
    {
        $this->title = '';
        $this->singular_title = '';
        $this->action = 'files';
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
     * @param FilesDataTable $dataTable
     * @return mixed
     */
    public function index(FilesDataTable $dataTable, $type){
        
        canAccessTo($this->permissions->access);

        viewExist($this->views->index);

        $type = TypesFiles::where('system_name', $type)->first();

        if ($type==null) {
            abort(404);
        }

        if ($type->title == null) {
            abort(404);
        }

        $dataTable->params = [
            'type'  => $type->system_name,
            'type_id'  => $type->id,
        ];

        $dataTable->type_id = $type->id;
        
        $this->title = $type->title;
        $this->singular_title = $type->title;

        return $dataTable->render($this->views->index,
            [
                'type'  => $type->system_name,
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
    public function create($type_id){

        canAccessTo($this->permissions->create);

        viewExist($this->views->create);

        return view($this->views->create)
            ->with('route', 'admin.'.$this->action.'.store-item')
            ->with('params', ['type_id' => $type_id])
            ->with('type_id',  $type_id)
            ->with('action', $this->action);
    }

     // TODO
    /**
     * Store new item into DB
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(StoreFilesRequest $request){
        
        canAccessTo($this->permissions->create);

        $request->merge([
            'short_description' => $request->input('title'),
            // 'type_id'           => $type_id
        ]);

        $item = GroupFile::create($request->all());
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
     * @param UploadFileRequest
     */
    public function updoadFiles(Request $request)
    // public function updoadFiles(UploadFileRequest $request)
    {
        set_time_limit(0);

        $path = $request->file->store('files');
        if(Storage::disk('local')->exists($path)){
            $file = Storage::disk('local')->get($path);
            $filename = basename($path);
            Storage::disk('files')->put( $request->input('group_id').'/' . $filename, $file);

            Files::create([
                'group_id'  => $request->input('group_id'),
                'description' => $request->input('description'),
                'file'             => $filename, 
            ]);
            Storage::disk('local')->delete($path);

            return response()->json([
                'message' => 'Archivo subido',
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

        $item = GroupFile::with('items')->find($id);

        if($item == null){
            return response()->json([
                'message'    => 'Ítem no encontrado'
            ],404);
        }

        return view($this->views->edit)
            ->with('item', $item)
            ->with('route_upload', 'admin.'.$this->action.'.store.upload')
            ->with('route', 'admin.'.$this->action.'.update')
            ->with('action', $this->action);
    }
    
    /**
     * Update an item
     *
     * @param UpdateFilesRequest $request
     * @return JsonResponse
     */
    public function update(UpdateFilesRequest $request){

        canAccessTo($this->permissions->edit);

        $item = GroupFile::find($request->input('id'));
        
        if($item == null){
            return response()->json([
                'message'    => 'ítem no encontrado'
            ],404);
        }

        $item->title    = $request->input('title');
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
        $item = Files::find($id);
        
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

        $item = GroupFile::find($id);
        
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

        $item = GroupFile::find($request->input('id'));
        
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
