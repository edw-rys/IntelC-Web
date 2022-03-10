<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;
use App\Models\Accommodation;
use App\Models\Blog;
use App\Models\Directions;
use App\Models\GroupFile;
use App\Models\Models\Visitants;
use App\Models\Notice;
use App\Models\Obra;
use App\Models\PlanesPrices;
use App\Models\Questions;
use App\Models\Schedule;
use App\Models\ScheduleType;
use App\Models\Service;
use App\Models\TypeObra;
use App\Models\TypesFiles;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FrontController extends Controller
{
    private $views;
    /**
     * FrontController Constructor
     */
    public function __construct() {
        $this->views = (object)[
            'page'      => 'static.',
            'dinamic'   => 'dinamic.'
        ];
    }
    /**
     * Return view
     */
    public function index($page)
    {
        if ($page == 'blog') {
            return $this->showBlogs();
        }

        if ($page == 'faq') {
            $items = Questions::select('*')
                ->paginate(20);
            return view($this->views->page .$page)
                ->with('items', $items)
                ->with('title', trans('global.pages.'.$page))
                ->with('meta_description', 'global.meta_description.'.$page);
        }
        viewExist($this->views->page .$page);

        return view($this->views->page .$page)
            ->with('title', trans('global.pages.'.$page))
            ->with('meta_description', 'global.meta_description.'.$page);
    }

    /**
     * Submit mail
     * @param Request $request
     */
    public function submit(ContactRequest $request)
    {
        Mail::to([config('app_intelc.email_user')])->send( new ContactMail($request->input('message'), $request->input('subject'), $request->input('name'), $request->input('email')));

        return redirect()
            ->back()
            ->with('message', 'Mensaje enviado');
    }

    /**
     * Get Blogs
     */
    public function showBlogs()
    {
        viewExist($this->views->dinamic .'blog');

        // $items = PlanesPrices::select('*')
        $items = Blog::select('*')
            ->paginate(20);

        return view($this->views->dinamic .'blog')
            ->with('title', 'Blog|IntelC')
            ->with('meta_description', 'Blog,IntelC,Palora')
            ->with('items',$items);
    }
    /**
     * Get Blog
     */
    public function showBlog($id)
    {
        viewExist($this->views->dinamic .'show-blog');

        $item = Blog::select('*')
            ->with('user_created')
            ->find($id);

        return view($this->views->dinamic .'show-blog')
            ->with('title', $item->title.'|IntelC')
            ->with('meta_description', 'Blog,IntelC,Palora')
            ->with('item',$item);
    }
    /**
     * @param $type
     */
    public function getFiles($type)
    {
        $type = TypesFiles::where('system_name', $type)->first();

        if ($type == null) {
            abort(404);
        }

        viewExist($this->views->dinamic .'files');


        $items = GroupFile::where('type_id', $type->id)
            ->where('status', 'active')
            ->paginate(5);
            
        return view($this->views->dinamic .'files')
            ->with('type',$type)
            ->with('title',$type->title)
            ->with('meta_description', $type->title.',Palora,Ecuador')
            ->with('items',$items);
    }
}

