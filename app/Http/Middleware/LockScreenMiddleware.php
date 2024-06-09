<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LockScreenMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Si la sesión tiene una clave 'locked' y es true, redirige a la pantalla de bloqueo
        if ($request->session()->get('locked') === true) {
            return redirect()->route('lockscreen');
        }

        return $next($request);
    }
}

