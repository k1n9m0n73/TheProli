<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if ($guard == 'customer' && Auth::guard($guard)->check()) {
                    return redirect('/'); //dont redirect if is customer
                    //abort(code:403);
                }else if ($guard == 'admin' && Auth::guard($guard)->check()) {
                    
                    return redirect('admin/login'); //dont redirect if is customer
                }else if ($guard == 'agg' && Auth::guard($guard)->check()) {
                    
                    return redirect('aggregator/login'); //dont redirect if is customer
                }else if ($guard == 'far' && Auth::guard($guard)->check()) {
                    
                    return redirect('farmer/login'); //dont redirect if is customer
                }else if ($guard == 'log' && Auth::guard($guard)->check()) {
                    
                    return redirect('logistics/login'); //dont redirect if is customer
                }else if ($guard == 'war' && Auth::guard($guard)->check()) {
                    
                    return redirect('warehouse/login'); //dont redirect if is customer
                }
                return $next($request);
            }
        }

        

        return $next($request);
    }
}
