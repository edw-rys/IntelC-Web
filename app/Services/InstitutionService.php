<?php
namespace App\Services;

use App\Models\Account;
use App\Models\AutoConfigLabels;
use App\Models\Connections;
use App\Models\School;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InstitutionService
{
    public function __construct() {
    }
    /**
     * Store a institution
     * @param Request $request
     */
    public function store(Request $request)
    {
        if ($request->hasFile('logo')) {
            try {
                // dd(config('app_intelc.routes.images_logo'));
                $path = $request->logo->store('local');
                if(Storage::disk('local')->exists($path)){
                    $content = Storage::disk('local')->get($path);
                    // dd(config('app_intelc.routes.images_logo') . '/' . $institution->subdomain. '_logo.png');
                    // $files = Storage::disk('ftp')->allFiles();
                    // Storage::disk('ftp')->put(config('app_intelc.routes.dir') . config('app_intelc.routes.images_logo') . '/' . '_logo.png',$content);
                }
            } catch (\Throwable $th) {
                Log::error($th->getMessage());
                Log::error($th->getTrace());
                // dd($th->getMessage());
            }
        }
        if ($request->hasFile('isotipo')) {
            try {
                $path = $request->isotipo->store('local');
                if(Storage::disk('local')->exists($path)){
                    $content = Storage::disk('local')->get($path);
                    // Storage::disk('liranka_local')->put(config('app_intelc.routes.images_logo') . '/' . $institution->subdomain. '_isotipo.png',$request->file('isotipo'));
                }
            } catch (\Throwable $th) {
                Log::error($th->getMessage());
                Log::error($th->getTrace());
                // dd($th->getMessage());
            }
        }
        // Create Data
        Connections::create([
            'email'             => $request->input('email'),
            'password'          => bcrypt(createNewRandomPassword()),
            'url'               => 'https://'.$request->input('subdomain'). '.'.config('app_intelc.domain'),
            'institution_name'  => $request->input('name'),
            'institution_key'   => $request->input('subdomain'),
            'env'               => config('app.enviropment'),
            'user'              => config('database.connections.mysql.username'),
            'role'              => config('app.role_institution'),
            'created_at'        => Carbon::now()
            // 'api_url'           => $institution->name,
        ]);
    }
    /**
     * Administrator
     * @param Request $request
     */
    public function update(Request $request)
    {
        $data = User::find(auth()->user()->id);
        if($data == null ){
            return (object)[
                'message'   => 'No existe registro',
                'status'    => 'error'
            ];
        }

        if ($request->hasFile('picture')) {
            try {
                $path = $request->picture->store('local');
            } catch (\Throwable $th) {
                Log::error($th->getMessage());
                Log::error($th->getTrace());
            }
        }
        
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        if($request->input('password')){
            $data->password = bcrypt($request->input('password'));
        }
        $data->save();
    }


    /**
     * Administrator
     * @param Request $request
     */
    public function updatefromAdmin(Request $request)
    {
        $conn = new Connections();
        $conn = $conn->setConnection(config('app.db_conn_name'));
        $data = $conn->find($request->input('id'));
        if($data == null ){
            return (object)[
                'message'   => 'No existe registro',
                'status'    => 'error'
            ];
        }

        if ($request->hasFile('logo')) {
            try {
                // dd(config('app_intelc.routes.images_logo'));
                $path = $request->logo->store('local');
                if(Storage::disk('local')->exists($path)){
                    $content = Storage::disk('local')->get($path);
                    // dd(config('app_intelc.routes.images_logo') . '/' . $institution->subdomain. '_logo.png');
                    // $files = Storage::disk('ftp')->allFiles();
                    // Storage::disk('ftp')->put(config('app_intelc.routes.dir') . config('app_intelc.routes.images_logo') . '/' . '_logo.png',$content);
                }
            } catch (\Throwable $th) {
                Log::error($th->getMessage());
                Log::error($th->getTrace());
                // dd($th->getMessage());
            }
        }
        if ($request->hasFile('isotipo')) {
            try {
                $path = $request->isotipo->store('local');
                if(Storage::disk('local')->exists($path)){
                    $content = Storage::disk('local')->get($path);
                    // Storage::disk('liranka_local')->put(config('app_intelc.routes.images_logo') . '/' . $institution->subdomain. '_isotipo.png',$request->file('isotipo'));
                }
            } catch (\Throwable $th) {
                Log::error($th->getMessage());
                Log::error($th->getTrace());
                // dd($th->getMessage());
            }
        }
        
        $data->institution_name = $request->input('institution_name');
        $data->email = $request->input('email');
        if($request->input('password')){
            $data->password = bcrypt($request->input('password'));
        }
        if($data->status == 'created'){
            $data->institution_key = $request->input('subdomain');
            $data->url = 'https://'.$request->input('subdomain'). '.'.config('app_intelc.domain');
            $data->institution_name = $request->input('institution_name');
            $data->database = $request->input('database');
        }
        $data->save();
    }

    /**
     * @param $nameDb
     */
    public function checkDataBase($nameDb)
    {
        // dd($nameDb);
        $cot = 'utf8mb4_unicode_ci';
        $crearbd = DB::connection('mysql')->select("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = "."'".$nameDb."'");
        if(empty($crearbd)) {
            // DB::connection('mysql')->select('CREATE DATABASE '. $nameDb .'  CHARACTER SET utf8mb4 COLLATE '."'".$cot."';");
            $message = "La Base de Datos '$nameDb' de tipo mysql con Cotejamiento '$cot' ha sido creada Correctamente ! ";
            return (object)[
                'message' => $message,
                'status'   => 'success'
            ];  
        }
        else {
            $message = "La Base de Datos con el nombre '$nameDb' ya existe ! ";
            return (object)[
                'message' => $message,
                'status'   => 'error'
            ];
            return redirect()->route('auth.login.show')
                ->with('errors',[$message]);
        }
        $message = "Error";
        return (object)[
            'message' => $message,
            'status'   => 'error'
        ];
    }


    /**
     * @param $nameDb
     */
    public function createDataBase($nameDb, $key_name)
    {
        return;
        $conn_cobros = 'cobros_liranka_'.$key_name;
        // dd($nameDb);
        set_time_limit(0);
        createConfigDB($nameDb);
        createConfigDB($conn_cobros);
        // dd(config('database.connections.liranka_hola'));
        $cot = 'utf8mb4_spanish_ci';
        // dd(file_get_contents('../database/backups/liranka.sql'));
        // dd(__DIR__);
        $crearbd = DB::connection('mysql')->select("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = "."'".$nameDb."'");
        if(empty($crearbd)) {
        

            return (object)[
                'message' => $message,
                'status'   => 'success'
            ];  
            $user = new Account();
            $user->setConnection($nameDb);
        }
        else {
            $message = "La Base de Datos con el nombre '$nameDb' ya existe ! ";
            return (object)[
                'message' => $message,
                'status'   => 'error'
            ];
            return redirect()->route('auth.login.show')
                ->with('errors',[$message]);
        }
        $message = "Error";
        return (object)[
            'message' => $message,
            'status'   => 'error'
        ];
    }


    /**
     * Change label on AutoConfigLabels
     */
    public function changeLabel($key)
    {
        createConfigDB(auth()->user()->database);
        $AutoConfigLabels = new AutoConfigLabels;
        $AutoConfigLabels->setConnection(auth()->user()->database);
        $AutoConfigLabels = $AutoConfigLabels->all()->first();
        if ($AutoConfigLabels == null) {
            $AutoConfigLabels = $AutoConfigLabels->create([
                'enable_utiles' => 1,
                'enable_registro' => 1,
                'enable_pagos' => 1,
                'created_at'    => Carbon::now()
            ]);
        }
        switch ($key) {
            case 'utiles':
                $AutoConfigLabels->enable_utiles = $AutoConfigLabels->enable_utiles ? '0' : 1 ;
                break;
            case 'pays':
                $AutoConfigLabels->enable_pagos = $AutoConfigLabels->enable_pagos ? '0' : 1 ;
                break;
            case 'signup':
                $AutoConfigLabels->enable_registro = $AutoConfigLabels->enable_registro ? '0' : 1 ;
                break;
            case 'password_change':
                $AutoConfigLabels->password_change = $AutoConfigLabels->password_change ? '0' : 1 ;
                break;
            default:
                break;
        }
        $AutoConfigLabels->save();
    }
    /**
     * Get value labels
     */
     public function getObjectLabel()
     {
        createConfigDB(auth()->user()->database);
        $AutoConfigLabels = new AutoConfigLabels;
        $AutoConfigLabels->setConnection(auth()->user()->database);
        return $AutoConfigLabels->firstOrCreate([],[
            'enable_utiles' => 1,
            'enable_registro' => 1,
            'enable_pagos' => 1,
            'created_at'    => Carbon::now()
        ]);
     }
}
