<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
      $usuario_actual = \Auth::user();
        if (Auth::guard($guard)->check() && $usuario_actual->role_id==1) {
            return redirect('admin/');
        }elseif (Auth::guard($guard)->check()  && $usuario_actual->role_id==2) {
          return redirect('qa/');
        }elseif (Auth::guard($guard)->check()  && $usuario_actual->role_id==3) {
            return redirect('supervisor/');
          }elseif (Auth::guard($guard)->check()  && $usuario_actual->role_id==4) {
            return redirect('agent/');
          }

        return $next($request);
    }

 
}
