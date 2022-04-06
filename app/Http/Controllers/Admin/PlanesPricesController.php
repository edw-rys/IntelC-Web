<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\PlanesPricesDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PlanesPrices\StorePlanesPricesRequest;
use App\Http\Requests\Admin\PlanesPrices\UpdatePlanesPricesRequest;
use App\Models\Icons;
use App\Models\PlanesPrices;
use App\Models\ServiceContent;
use App\Models\TypePlanes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PlanesPricesController extends Controller
{
    /**
     * Constructor Alojamiento
     *
     */
    public function __construct()
    {
        $this->title = 'Planes y precios';
        $this->singular_title = 'Plan';
        $this->action = 'planes-prices';
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
     * @param PlanesPricesDataTable $dataTable
     * @return mixed
     */
    public function index(PlanesPricesDataTable $dataTable){
        
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
            ->with('type_plans', TypePlanes::all())
            ->with('singular_title',$this->singular_title)
            ->with('action', $this->action);
    }

     // TODO
    /**
     * Store new item into DB
     *
     * @param StorePlanesPricesRequest $request
     * @return JsonResponse
     */
    public function store(StorePlanesPricesRequest $request){
        
        canAccessTo($this->permissions->create);

        $request->merge([
            'created_by'        => auth()->user()->id,
            'updated_by'        => auth()->user()->id,
        ]);

        $item = PlanesPrices::create($request->all());
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

        $item = PlanesPrices::find($id);

        if($item == null){
            return response()->json([
                'message'    => 'Ítem no encontrado'
            ],404);
        }

        return view($this->views->edit)
            ->with('item', $item)
            ->with('route_upload', 'admin.'.$this->action.'.store.upload')
            ->with('type_plans', TypePlanes::all())
            ->with('icons', Icons::all())
            ->with('singular_title',$this->singular_title)
            ->with('route', 'admin.'.$this->action.'.update')
            ->with('action', $this->action);
    }
    
    /**
     * Update an item
     *
     * @param UpdatePlanesPricesRequest $request
     * @return JsonResponse
     */
    public function update(UpdatePlanesPricesRequest $request){

        canAccessTo($this->permissions->edit);

        $item = PlanesPrices::find($request->input('id'));
        
        if($item == null){
            return response()->json([
                'message'    => 'ítem no encontrado'
            ],404);
        }

      
        
        $item->type_id  = $request->input('type_id');
        $item->image    = $request->input('image');
        $item->title    = $request->input('title');
        $item->price    = $request->input('price');
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
    public function destroy( $id){

        canAccessTo($this->permissions->delete);

        $item = PlanesPrices::find($id);
        
        if($item == null){
            return response()->json([
                'message'    => 'ítem no encontrado'
            ],404);
        }

        $item->deleted_by = auth()->user()->id;
        $item->save();
        $item->delete();

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

        $item = PlanesPrices::withTrashed()->find($request->input('id'));
        
        if($item == null){
            return response()->json([
                'message'    => 'Ítem no encontrado'
            ],404);
        }

        $item->deleted_at = null;
        $item->deleted_by = null;
        $item->save();

        return response()->json([
            'message' => 'Restaurado',
            'action'  => 'restore',
            'status'  => 'success'
        ]);
    }
}
