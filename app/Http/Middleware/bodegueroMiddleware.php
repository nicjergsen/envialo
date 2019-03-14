<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Empleado;

class bodegueroMiddleware
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
        if (session('idTipusu') == 3) {
            $empleadoActivo = Empleado::where("rut", "=", session('rutUsuario'))->where("isActive", "=", "1")->first();
            if (count($empleadoActivo) != 0)
                return $next($request);
        } else {
            if (session('username') == null) {
                return redirect('/login')->with('mensaje', 'Inicie sesión por favor');
            }
            return redirect('/')->with('error', 'No tiene permisos suficientes');
        }
    }
}
