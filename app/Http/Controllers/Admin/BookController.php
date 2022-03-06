<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BookDataTable;
use App\DataTables\CourseDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Institution\Course\DestroyCourseRequest;
use App\Http\Requests\Institution\Course\RestoreCourseRequest;
use App\Models\Book;
use App\Models\School;
use App\Models\Section;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Constructor
     *
     */
    public function __construct()
    {
        $this->title = 'Libros';
        $this->singular_title = 'Libro';
        $this->action = 'books';
        $this->permissions  = (object) [
            'access'        => 'access_books',
            'create'        => 'create_books',
            'edit'          => 'edit_books',
            'show'          => 'show_books',
            'delete'        => 'delete_books',
            'restore'       => 'restore_books',
        ];

        $this->views        = (object) [
            'index'         => 'admin.pages.books.index',
            'create'        => 'admin.pages.books.create',
            'edit'          => 'admin.pages.books.edit',
            'show'          => 'admin.pages.books.show'
        ];

        $this->routes       = (object) [
            'index'         => 'admin.books.index',
            'create'        => 'admin.books.create',
            'edit'          => 'admin.books.edit',
            'show'          => 'admin.books.show'
        ];
    }


    /**
     * List all items
     *
     * @param BookDataTable $dataTable
     * @return mixed
     */
    public function index(BookDataTable $dataTable){
        
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
            ->with('route', 'admin.books.store')
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

        $book = Book::find($id);
        
        if($book== null){
            return  '';
        }

        return view($this->views->show)
            ->with('book', $book)
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
        $request->merge([
            'code'  => $request->input('name')
        ]);
        Book::create($request->all());

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

        $item = Book::find($id);

        if($item == null){
            return response()->json([
                'message'    => 'Libro no encontrado'
            ],404);
        }

        return view($this->views->edit)
            ->with('item', $item)
            ->with('route', 'admin.books.update')
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

        $item = Book::find($request->input('id'));
        
        if($item == null){
            return response()->json([
                'message'    => 'Libro no encontrado'
            ],404);
        }
        
        $item->name = $request->input('name');
        $item->code = $request->input('name');
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

        $item = Book::find($id);
        
        if($item == null){
            return response()->json([
                'message'    => 'Libro no encontrado'
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
    public function restore(RestoreCourseRequest $request){

        canAccessTo($this->permissions->delete);

        $item = Book::find($request->input('id'));
        
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
