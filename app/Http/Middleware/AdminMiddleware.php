<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;
class AdminMiddleware
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

      if (Auth::user()->role != "normal") {
        return $next($request);
      } else {
          Auth::logout();
        return redirect("/")->with('status',"Nie masz uprawnień do tych zasobów!");
      }
       
        return $next($request);
    }
}
//t6u$8&DgN$J&$cH4CH