<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
     /**
     * Institution Contructor 
     */
    public function __construct() {
        $this->title ='Login';
    }
    /**
     * Show view Login
     */
    public function loginShow(){
        return view('users.login')
            ->with('title', $this->title);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request){
        $request->merge([
            'email' => trim ( $request->input('email'))
        ]);
        $credentials = $request->only('email','password');
        $user = User::where('email', $request->input('email'))->first();
        // logear
        if($user){
            if($user->status != 'active'){
                return redirect()->route('auth.login.show')
                    ->with('errors',['El usuario está bloqueado']);
            }
        }
        if(Auth::attempt($credentials)){

            return redirect()->route('admin.dashboard.index');
        }
        return redirect()->route('auth.login.show')
            ->with('errors',['Datos Incorrectos']);
    }

    /**
     * Elimina sesion y redirecciona al login
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(){
        Auth::logout();
        return redirect()->route('auth.login.show');
    }
}
