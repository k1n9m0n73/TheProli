<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Symfony\Component\Routing\Router;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
             // var_dump($_SERVER);
              if(preg_match("/aggregator/", $_SERVER['REQUEST_URI']) ){
                   return route('aggregator.login');
              }
              elseif(preg_match("/farmer/", $_SERVER['REQUEST_URI']) ){
                return route('farmer.login');
              }
              elseif(preg_match("/logistics/", $_SERVER['REQUEST_URI']) ){
                return route('logistics.login');
             }elseif(preg_match("/warehouse/", $_SERVER['REQUEST_URI']) ){
                return route('warehouse.login');
             }
             elseif(preg_match("/admin/", $_SERVER['REQUEST_URI']) ){
                return route('admin.login');
             }
             elseif(preg_match("/hub/", $_SERVER['REQUEST_URI']) ){
               return route('hub.login');
            }
             else{
                return route('login') ;
             }
             exit; 
            //return route('login');
        }
    }
}
