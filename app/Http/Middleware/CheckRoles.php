<?php

namespace App\Http\Middleware;

use Closure;

class CheckRoles
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
        // func_get_args: Devuelve un Array con TODOS los parámetros del método en el que estamos.
        // array_slice([], 2): Extrae los dos primeros elementos del Array (elementos que no necesitamos).

        $roles = array_slice( func_get_args(), 2);
        // dd($roles);

        if ( auth()->user()->hasRoles($roles) ) 
        {
            return $next($request);
        }

        return redirect('/');
    }
    
}
