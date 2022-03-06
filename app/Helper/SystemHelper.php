<?php

use App\Models\TimeCaduce;
use App\Models\TimeCaduceLicence;
use \Illuminate\Support\Facades\Route;

use function Ramsey\Uuid\v1;

if (! function_exists('titleView')) {
    /**
     * Get Title view
     *
     * @return string
     */
    function titleView(): string
    {
        $route = Route::getCurrentRoute()->getName() ;
        $routeList = explode('.', $route);
        if(count($routeList) > 2){
            return config('app_intelc.views_title.'.$routeList[1]) ?? $routeList[1] ;
        }
        return $route; 
    }
}


if (! function_exists('timeCaduceLicence')) {
    /**
     * Get Title view
     *
     * @return mixed
     */
    function timeCaduceLicence() 
    {
        return TimeCaduceLicence::where('status', 'active')->get();
    }
}



if (! function_exists('timeCaduce')) {
    /**
     * Get Title view
     *
     * @return mixed
     */
    function timeCaduce() 
    {
        return TimeCaduce::where('status', 'active')->get();
    }
}
