<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;
use App\Models\Accommodation;
use App\Models\Directions;
use App\Models\GroupFile;
use App\Models\Models\Visitants;
use App\Models\Notice;
use App\Models\Obra;
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
        Mail::to([$request->input('email')])->send( new ContactMail($request->input('message'), $request->input('subject'), $request->input('name'), $request->input('email')));

        return response()->json([
            'message'   => 'Correo enviado',
            'token'     => csrf_token()
        ]);
    }
    /**
     * @param $type
     */
    public function getOrders($type)
    {
        $type = TypesFiles::where('system_name', $type)->first();

        if ($type == null) {
            abort(404);
        }

        viewExist($this->views->dinamic .'files');


        $items = GroupFile::
            // select('group_file.*')
            // ->join('type_files', 'type_files.id', 'group_file.type_id')
            // ->where('type_files.system_name', $type)
            where('type_id', $type->id)
            ->where('status', 'active')
            ->paginate(5);
        return view($this->views->dinamic .'files')
            ->with('type',$type)
            ->with('title',$type->title)
            ->with('meta_description', $type->title.',Palora,Ecuador')
            ->with('items',$items);
    }
    /**
     * Get services
     */
    public function services()
    {
        viewExist($this->views->dinamic .'services');


        $items = Service::where('status', 'active')
            ->paginate(20);

        return view($this->views->dinamic .'services')
            ->with('title', 'Servicios')
            ->with('meta_description', 'Servicios,Palora,Ecuador')
            ->with('items',$items);
    }
    /**
     * Show service
     * @param $id
     */
    public function showService($id)
    {
        $item = Service::where('status', 'active')
            ->with('items')
            ->find($id);

        if ($item == null) {
            abort(404);
        }

        return view($this->views->dinamic .'service')
            ->with('title', 'Servicio')
            ->with('meta_description', 'Servicios,Palora,Ecuador')
            ->with('item',$item);
    }

    /**
     * Get accommodations
     */
    public function accommodations()
    {
        viewExist($this->views->dinamic .'alojamientos');


        $items = Accommodation::where('status', 'active')
            ->paginate(20);

        return view($this->views->dinamic .'alojamientos')
            ->with('title', 'Alojamientos')
            ->with('meta_description', 'Estadía,Palora,Ecuador')
            ->with('items',$items);
    }

    /**
     * Show service
     * @param $id
     */
    public function showAccommodation($id)
    {
        $item = Accommodation::where('status', 'active')
            ->with('items')
            ->find($id);

        if ($item == null) {
            abort(404);
        }

        return view($this->views->dinamic .'alojamiento')
            ->with('title', 'Alojamiento')
            ->with('meta_description', 'alojamiento,Palora,Ecuador')
            ->with('item',$item);
    }
    /**
     * @param $type
     */
    public function getEvents($type)
    {
        $typeEvent = ScheduleType::where('system_name', $type)
            ->first();

        if ($typeEvent == null) {
            abort(404);
        }
        
        viewExist($this->views->dinamic .'events');

        $items = Schedule::where('status', 'active')->where('schedule_type_id', $typeEvent->id)
            ->orderBy('start_date')
            ->paginate(10);

        return view($this->views->dinamic .'events')
            ->with('type',$typeEvent)
            ->with('title',$typeEvent->title)
            ->with('meta_description', $typeEvent->title.',Palora,Ecuador')
            ->with('items',$items);
    }

    /**
     * @param $id
     */
    public function showEvent($id)
    {
        $item = Schedule::where('status', 'active')
            ->with('participants')
            ->with('type')
            ->find($id);

        if ($item == null) {
            abort(404);
        }

        $diffDays = 0 ; 
        $diffDaysInHour = 0 ; 
        $diffHours = 0;
        $diffHMinutes = 0;
        
        $nowTime = Carbon::now();

        if ($item->start_date != null) {
            $diffDays = $item->start_date->diff($nowTime)->days;
            $diffDaysInHour = $item->start_date->diff($nowTime)->days * 24;
            $diffHours = $item->start_date->diffInHours($nowTime);
            $diffHMinutes = $item->start_date->diffInMinutes($nowTime);
        }
        return view($this->views->dinamic .'event')
            ->with('item',$item)
            ->with('diffDays',$diffDays)
            ->with('diffDaysInHour',$diffDaysInHour)
            ->with('diffHMinutes',$diffHMinutes)
            ->with('diffHours',$diffHours)
            ->with('nowTime', Carbon::now())
            ->with('title',$item->title)
            ->with('meta_description', $item->title.',Palora,Ecuador');
    }
    
    /**
     * Obras públicas
     */
    public function typeObras()
    {
        viewExist($this->views->dinamic .'typeobras');

        $items = TypeObra::where('status', 'active')
            ->orderBy('id', 'desc')
            ->get();

        return view($this->views->dinamic .'typeobras')
            ->with('title','Obras públicas')
            ->with('meta_description', 'Obras públicas,Palora,Ecuador')
            ->with('items',$items);
    }
    /**
     * Get direcctions
     */
    public function directions()
    {
        viewExist($this->views->dinamic .'directions');

        $items = Directions::where('status', 'active')
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view($this->views->dinamic .'directions')
            ->with('title','Direcciones')
            ->with('meta_description', 'Ubicaciones,Palora,Ecuador')
            ->with('items',$items);
    }

    /**
     * Get direcctions
     */
    public function showDirection($id)
    {
        viewExist($this->views->dinamic .'direction');

        $item = Directions::where('status', 'active')
            ->find($id);

        if ($item == null) {
            abort(404);
        }

        return view($this->views->dinamic .'direction')
            ->with('title','Direcciones')
            ->with('meta_description', 'Ubicaciones,Palora,Ecuador')
            ->with('item',$item);
    }

    /**
     * Get direcctions
     */
    public function notices()
    {
        viewExist($this->views->dinamic .'notices');

        $items = Notice::where('status', 'active')
            ->orderBy('id', 'desc')
            ->paginate(15);

        return view($this->views->dinamic .'notices')
            ->with('title','Noticias')
            ->with('meta_description', 'Noticias,Palora,Ecuador')
            ->with('items',$items);
    }

    /**
     * Obras públicas
     */
    public function showNotices( $id)
    {
        viewExist($this->views->dinamic .'notice');

        $item = Notice::where('status', 'active')
            ->with('items')
            ->find($id);
            
        if ($item == null) {
            abort(404);
        }

        return view($this->views->dinamic .'notice')
            ->with('title','Noticia')
            ->with('meta_description', 'Noticias,Palora,Ecuador')
            ->with('item',$item);
    }
    /**
     * Obras públicas
     */
    public function showObras( $id)
    {
        viewExist($this->views->dinamic .'obras');

        $type = TypeObra::where('status', 'active')
            ->find($id);

        if ($type == null) {
            abort(404);
        }

        $items = Obra::where('status', 'active')
            ->with('type')
            ->where('type_id',$id)
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view($this->views->dinamic .'obras')
            ->with('title','Obras públicas')
            ->with('meta_description', 'Obras públicas,Palora,Ecuador')
            ->with('items',$items)
            ->with('type',$type);
    }
    /**
     * @param Request
     */
    public function searchGlobal(Request $request)
    {
        // Obras
        $obras = Obra::where('status', 'active')
            ->with('type')
            ->orderBy('id', 'desc')
            ->where('title', 'like', '%'. $request->input('search') . '%')
            ->get();

        // Servicios
        $events = Schedule::where('status', 'active')
            ->where('title', 'like', '%'. $request->input('search') . '%')
            ->orderBy('start_date')
            ->get();

         // Servicios
        $services = Service::where('status', 'active')
            ->where('title', 'like', '%'. $request->input('search') . '%')
            ->get();

        return view($this->views->dinamic .'results')
            ->with('title','Búscar')
            ->with('meta_description', 'Obras públicas,Palora,Ecuador')
            ->with('obras',$obras)
            ->with('events',$events)
            ->with('services',$services)
            ;
        

    }
}

