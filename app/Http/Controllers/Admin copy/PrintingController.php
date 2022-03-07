<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\PrintingDataTable;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Printing;
use App\Models\School;
use App\Models\Section;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PrintingController extends Controller
{
    /**
     * Constructor
     *
     */
    public function __construct()
    {
        $this->title = 'Imprentas';
        $this->singular_title = 'Imprenta';
        $this->action = 'printing';
        $this->permissions  = (object) [
            'access'        => 'access_printing',
            'create'        => 'create_printing',
            'edit'          => 'edit_printing',
            // 'show'          => 'show_printing',
            'delete'        => 'delete_printing',
            'restore'       => 'restore_printing',
        ];

        $this->views        = (object) [
            'index'         => 'admin.pages.printing.index',
            'create'        => 'admin.pages.printing.create',
            'edit'          => 'admin.pages.printing.edit',
            'show'          => 'admin.pages.printing.show'
        ];

        $this->routes       = (object) [
            'index'         => 'admin.printing.index',
            'create'        => 'admin.printing.create',
            'edit'          => 'admin.printing.edit',
            'show'          => 'admin.printing.show'
        ];
    }


    /**
     * List all items
     *
     * @param PrintingDataTable $dataTable
     * @return mixed
     */
    public function index(PrintingDataTable $dataTable){
        
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
            ->with('route', 'admin.printing.store')
            ->with('action', $this->action);
    }

    /**
     * Show a item
     *
     * @return Factory|View
     */
    public function show($id){

        canAccessTo($this->permissions->show);

        viewExist($this->views->show);

        $printing = Printing::find($id);
        
        if($printing== null){
            return  '';
        }

        return view($this->views->show)
            ->with('printing', $printing)
            ->with('action', $this->action);
    }

     // TODO
    /**
     * Store new item into DB
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request){
        
        canAccessTo($this->permissions->create);
        Printing::create($request->all());

        return response()->json([
            'message' => 'Creado',
            'action'  => 'create'
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

        $item = Printing::find($id);

        if($item == null){
            return response()->json([
                'message'    => 'Imprenta no encontrada'
            ],404);
        }

        return view($this->views->edit)
            ->with('item', $item)
            ->with('route', 'admin.printing.update')
            ->with('action', $this->action);
    }

    

    /**
     * Update an item
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function update(Request $request){

        canAccessTo($this->permissions->edit);

        $item = Printing::find($request->input('id'));
        
        if($item == null){
            return response()->json([
                'message'    => 'Imprenta no encontrada'
            ],404);
        }
        
        $item->name = $request->input('name');
        $item->save();

        return response()->json([
            'message' => 'Editado',
            'action'  => 'edit'
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

        $item = Printing::find($id);
        
        if($item == null){
            return response()->json([
                'message'    => 'Imprenta no encontrada'
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

        $item = Printing::find($request->input('id'));
        
        if($item == null){
            return response()->json([
                'message'    => 'Libro no encontrado'
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
