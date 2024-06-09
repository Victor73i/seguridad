<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LockScreenController extends Controller
{
    public function showLockScreenForm(Request $request)
    {
        $request->session()->put('locked', true);

        // Solo muestra la plantilla si el usuario está autenticado
        if (Auth::check()) {
            return view('auth-lockscreen-basic');
        }
        return redirect()->route('login');
    }

    public function unlockScreen(Request $request)
    {
        // Validar el input
        $request->session()->forget('locked');
        $request->validate([
            'password' => 'required',
        ]);

        // Verificar la contraseña del usuario
        if (Hash::check($request->password, Auth::user()->password)) {
            return redirect()->intended('/'); // Redireccionar a la página que quieras
        }

        // Si la contraseña no coincide, regresar a la pantalla de bloqueo con un mensaje de error
        return back()->withErrors([
            'password' => 'La contraseña no coincide con nuestros registros.',
        ]);
    }
}

