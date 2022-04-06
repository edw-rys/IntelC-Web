<?php

namespace App\Http\Middleware;

use App\Models\Views;
use Illuminate\Support\Facades\Cookie;
use Closure;

class SaveViewMiddleware
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
        // $pageVisited = isset($_COOKIE['is_visited']);

        // if (!$pageVisited) {
            // $ip = $this->server->get('REMOTE_ADDR');
            Views::create(
                [
                    'ip_address'    => getClientIp()
                ]
            );
            Cookie::queue('is_visited', 'true', 60 * 24 * 365);
            // cookie('is_visited', 'visite',60 * 24 * 365);
        // }   
        return $next($request);
    }
}
