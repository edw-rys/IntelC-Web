<?php

namespace App\Http\Middleware;

use Closure;

class SettingsDatabase
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // dd(auth()->user()->);
        // config(['database.default' => auth()->user()->database]);
        // // dd(config('database.connections.mysql'));
        // $institution_key_this = auth()->user()->institution_key;
        // $conn_cobros = 'cobros_liranka_'.$institution_key_this;
        // createConfigDB($conn_cobros);
        return $next($request);
    }
}
