<?php

namespace App\Http\Middleware;

use Closure;

class InstitutionSession
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
        if(session('institution') == null){
            return redirect()->route('register.institution.create');
        }
        return $next($request);
    }
}
