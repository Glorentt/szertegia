<?php

namespace App\Http\Middleware;

use Closure;

class qa
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
      $usuario_actual = \Auth::user();
      if ($usuario_actual !=null) {
        if ( $usuario_actual->role_id!=2) {
          return view('errors.404')->with('error','No tienes permisos suficientes');
        }
        return $next($request);
      }
      return redirect('/');
    }
}
