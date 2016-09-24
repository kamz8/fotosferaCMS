<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if (\Auth::user()->can($role . '-access')) {
            
          return $next($request);
        }else return redirect("/")->with('status',"Nie masz uprawnień do tych zasobów!");
        
        return $next($request);

    }
    
    /*in view you can use this clausure 
     *    @can('admin-access')
     *    some view elements for admin user
     *    @endcan 
     */
}
