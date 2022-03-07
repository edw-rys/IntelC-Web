<?php
use Illuminate\Contracts\Routing\UrlGenerator;

if (! function_exists('route_exists')) {
    /**
     * Route exists (true|false)
     *
     * @param $route
     * @return bool
     */
    function route_exists($route): bool
    {
        return Route::has($route);
    }
}

if (! function_exists('isActiveRoute')) {
    /**
     * Route exists (true|false)
     *
     * @param $route
     * @return bool
     */
    function isActiveRoute($route = ''): bool
    {
        $paramRouteName = \Illuminate\Support\Facades\Route::getCurrentRoute()->parameter('page');
        if ($paramRouteName == null) {
            $paramRouteName = 'home';
        }
        return $paramRouteName == $route ;
    }
}
