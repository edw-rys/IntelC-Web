<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AccomodationDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Accommodation\StoreAccommodationRequest;
use App\Http\Requests\Admin\Accommodation\UpdateAccommodationRequest;
use App\Http\Requests\Admin\Accommodation\UploadFileAccommodationRequest;
use App\Models\Accommodation;
use App\Models\AccommodationItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AccommodationController extends Controller
{
    /**
     * Constructor Alojamiento
     *
     */
    public function __construct()
    {
        $this->title = 'Alojamientos';
        $this->singular_title = 'Alojamiento';
        $this->action = 'accommodation';
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
     * @param AccomodationDataTable $dataTable
     * @return mixed
     */
    public function index(AccomodationDataTable $dataTable){
        
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
            ->with('action', $this->action);
    }

     // TODO
    /**
     * Store new item into DB
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(StoreAccommodationRequest $request){
        
        canAccessTo($this->permissions->create);

        $path = $request->image->store('accommodations');

        if(Storage::disk('local')->exists($path)){
            $file = Storage::disk('local')->get($path);
            $filename = basename($path);
            Storage::disk('accommodations')->put($filename, $file);

            $request->merge([
                'image' => $filename,
                'short_description' => $request->input('title')
            ]);
        }

        $item = Accommodation::create($request->all());
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
     * @param UploadFileAccommodationRequest
     */
    public function updoadFiles(UploadFileAccommodationRequest $request)
    {
        $path = $request->file->store('accommodations');

        if(Storage::disk('local')->exists($path)){
            $file = Storage::disk('local')->get($path);
            $filename = basename($path);
            Storage::disk('accommodations')->put($filename, $file);

            AccommodationItems::create([
                'accommodation_id'  => $request->input('accommodation_id'),
                'image'             => $filename
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

        $item = Accommodation::with('items')->find($id);

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
     * @param UpdateAccommodationRequest $request
     * @return JsonResponse
     */
    public function update(UpdateAccommodationRequest $request){

        canAccessTo($this->permissions->edit);

        $item = Accommodation::find($request->input('id'));
        
        if($item == null){
            return response()->json([
                'message'    => 'ítem no encontrado'
            ],404);
        }
        
        if ($request->image) {
            $path = $request->image->store('accommodations');
    
            if(Storage::disk('local')->exists($path)){
                $file = Storage::disk('local')->get($path);
                $filename = basename($path);
                Storage::disk('accommodations')->put($filename, $file);
                $item->image    = $filename;
            }
        }
        $item->title    = $request->input('title');
        $item->address  = $request->input('address');
        $item->phone    = $request->input('phone');
        $item->website  = $request->input('website');
        $item->email    = $request->input('email');

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
        $item = AccommodationItems::find($id);
        
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

        $item = Accommodation::find($id);
        
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

        $item = Accommodation::find($request->input('id'));
        
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
