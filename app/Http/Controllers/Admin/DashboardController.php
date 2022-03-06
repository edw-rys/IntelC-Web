<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AutoConfigLabels;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
    	// Mostar vista y enviar datos según el rol
        return view('users.dashboard');
    }
}
