<?php

namespace App\Http\Controllers;

use App\Models\Documentacion;
use App\Models\EquipoIt;
use App\Models\EstadoLog;
use App\Models\GlpiLocations;
use App\Models\GlpiTickets;
use App\Models\GlpiUsers;
use App\Models\Log;
use App\Models\Tarea;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $id_glpi_users = GlpiUsers::all();
        $id_glpi_tickets = GlpiTickets::all();
        $conteoEnProceso = Tarea::where('estado', 'en proceso')->count();
        $conteoEnEspera = Tarea::where('estado', 'en espera')->count();
        $conteoNuevo = Tarea::where('estado', 'nuevo')->count();
        $conteoFinalizado = Tarea::where('estado', 'finalizado')->count();
        $conteoBorrado = Tarea::where('estado', 'borrado')->count();
        $totalTarea = $conteoEnProceso + $conteoEnEspera + $conteoNuevo + $conteoFinalizado +$conteoBorrado;
        $conteoComputadoras = EquipoIt::where('type', 'computer')->count();
        $conteoImpresoras = EquipoIt::where('type', 'impresora')->count();
        $conteoPdus = EquipoIt::where('type', 'pdu')->count();
        $totalEquiposIT = $conteoComputadoras + $conteoImpresoras + $conteoPdus;
        $totalDocumentacion = Documentacion::count();
        $totalLog = Log::count();

        if (view()->exists($request->path())) {
            return view($request->path()
                ,[
                    'tareas'=> Tarea::latest()->paginate(5),'logs'=> Log::latest()->paginate(5),'documentacions'=> Documentacion::latest()->paginate(5),
                    'id_glpi_users' => $id_glpi_users,
                    'id_glpi_tickets' => $id_glpi_tickets], compact('totalTarea', 'totalEquiposIT','totalDocumentacion','totalLog'));

        }
        return abort(404);
    }

    public function root()
    {
        $id_glpi_users = GlpiUsers::all();
        $id_glpi_tickets = GlpiTickets::all();
        $conteoEnProceso = Tarea::where('estado', 'en proceso')->count();
        $conteoEnEspera = Tarea::where('estado', 'en espera')->count();
        $conteoNuevo = Tarea::where('estado', 'nuevo')->count();
        $conteoFinalizado = Tarea::where('estado', 'finalizado')->count();
        $conteoBorrado = Tarea::where('estado', 'borrado')->count();
        $totalTarea = $conteoEnProceso + $conteoEnEspera + $conteoNuevo + $conteoFinalizado +$conteoBorrado;
        $conteoComputadoras = EquipoIt::where('type', 'computer')->count();
        $conteoImpresoras = EquipoIt::where('type', 'impresora')->count();
        $conteoPdus = EquipoIt::where('type', 'pdu')->count();
        $totalEquiposIT = $conteoComputadoras + $conteoImpresoras + $conteoPdus;
        $totalDocumentacion = Documentacion::count();
        $totalLog = Log::count();
        return view('index',[
            'tareas'=> Tarea::latest()->paginate(5),'logs'=> Log::latest()->paginate(5),'documentacions'=> Documentacion::latest()->paginate(5), 'id_glpi_users' => $id_glpi_users,
            'id_glpi_tickets' => $id_glpi_tickets], compact('totalTarea', 'totalEquiposIT','totalDocumentacion','totalLog'));
    }

    /*Language Translation*/
    public function lang($locale)
    {
        if ($locale) {
            App::setLocale($locale);
            Session::put('lang', $locale);
            Session::save();
            return redirect()->back()->with('locale', $locale);
        } else {
            return redirect()->back();
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();

        // Redirecciona a la vista personalizada después del logout
        return redirect('/auth-logout-basic')->with('status', 'Has cerrado sesión con éxito.');
    }




}
