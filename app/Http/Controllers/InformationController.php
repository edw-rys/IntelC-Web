<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;
use App\Models\Files;
use App\Models\Models\Visitants;
use App\Models\Notice;
use App\Models\Obra;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class InformationController extends Controller
{
    private $views;
    /**
     * FrontController Constructor
     */
    public function __construct() {
        $this->views = (object)[
            'page'    => 'static.'
        ];
    }
    /**
     * Return object data
     * @param $model
     * @param $limit
     * @param $last 
     */
    public function getInfoByModel($model, $limit = 0, $last = true)
    {
        $notice = (new $model)->where('status', 'active');
        if ($limit != 0) {
            $notice = $notice->take($limit);
        }
        if ($last == true) {
            $notice = $notice->orderBy('id', 'desc');
        }
        return $notice->get();
    }

     /**
     * Return object data
     * @param $model
     * @param $limit
     * @param $last 
     */
    public function getInfoByFiles($limit = 0, $last = true)
    {
        $model = (new Files())
            ->select('files.*')
            ->where('files.status', 'active')
            ->join('group_file', 'group_file.id', 'files.group_id')
            ->join('type_files', 'type_files.id', 'group_file.type_id')
            ->where('type_files.system_name', 'ordenanzas')
            // ->groupBy('files.id')
            // ->distinct()
            ;

        if ($limit != 0) {
            $model = $model->take($limit);
        }
        if ($last = true) {
            $model = $model->orderBy('files.id', 'desc');
        }
        return $model->get();
    }
    /**
     * Get Data
     * @param $type
     * @param Request $request
     */
    public function get($type, Request $request)
    {
        $data = [];
        switch ($type) {
            case 'notice':
                $data = $this->getInfoByModel(Notice::class, $request->input('limit', 0), $request->input('last', true));
                break;
            case 'service':
                $data = $this->getInfoByModel(Service::class, $request->input('limit', 0), $request->input('last', true));
                break;
            case 'obra':
                $data = $this->getInfoByModel(Obra::class, $request->input('limit', 0), $request->input('last', true));
                break;
            case 'ordenanzas':
                $data = $this->getInfoByFiles($request->input('limit', 0), $request->input('last', true));
                break;
            default:
                # code...
                break;
        }
        return response()->json((object)[
            'status'    => 'find',
            'data'      => convert_from_latin1_to_utf8_recursively($data)
            ],200);
    }
}
