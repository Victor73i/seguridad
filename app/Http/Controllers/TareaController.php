<?php

namespace App\Http\Controllers;

use App\Http\Requests\TareaRequest;
use App\Models\GlpiTickets;
use App\Models\GlpiUsers;
use App\Models\Tarea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class TareaController extends Controller
{
    public function index(Request $request) {
        $conteoEnProceso = Tarea::where('estado', 'en proceso')->count();
        $conteoEnEspera = Tarea::where('estado', 'en espera')->count();
        $conteoNuevo = Tarea::where('estado', 'nuevo')->count();
        $conteoFinalizado = Tarea::where('estado', 'finalizado')->count();
        $conteoBorrado = Tarea::where('estado', 'borrado')->count();
        $totalTarea = $conteoEnProceso + $conteoEnEspera + $conteoNuevo + $conteoFinalizado +$conteoBorrado;

        $query = Tarea::query();

        // Filtrado por búsqueda general
        if ($searchTerm = $request->input('search')) {
            $query->where(function($query) use ($searchTerm) {
                $query->where('nombre', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('descripcion', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('estado', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('prioridad', 'LIKE', "%{$searchTerm}%");
                // Agrega aquí más campos si es necesario
            });
        }



        $filtro = $request->input('filter_by_type');

        // Filtra por estado, pero excluye 'borrado' si 'ALL' es seleccionado
        if ($filtro == 'ALL') {
            $query->where('estado', '!=', 'borrado');
        } elseif ($filtro == 'borrado') {
            $query->where('estado', 'borrado');
        } elseif ($filtro) {
            $query->where('estado', $filtro);
        }

        $tareas = $query->latest()->paginate(10);

        if ($request->ajax()) {
            // Solo devolver la sección de la tabla si la solicitud es AJAX
            return view('tareas.partials._tasksTable', compact('tareas'))->render();
        }
        $id_glpi_users = GlpiUsers::all();
        $id_glpi_tickets = GlpiTickets::all();

        return view('tarea.index', compact('tareas', 'id_glpi_users', 'id_glpi_tickets','totalTarea','conteoEnProceso', 'conteoEnEspera', 'conteoNuevo', 'conteoFinalizado', 'conteoBorrado'));
    }






    public function index1() {
        return view('index',[
            'tareas'=> Tarea::latest()->paginate(10)]);
    }
    //CREATE
    public function create()
    {
        $id_glpi_users = GlpiUsers::all();
        $id_glpi_tickets = GlpiTickets::all();
        return view('tarea.create',

        [
            'id_glpi_users' => $id_glpi_users,
            'id_glpi_tickets' => $id_glpi_tickets,
        ]);
    }
    //edit
    public function edit(String $id){
        $id_glpi_users = GlpiUsers::all();
        $id_glpi_tickets = GlpiTickets::all();

        return view('tarea.edit', [
            'tarea'=>\App\Models\Tarea::findOrFail($id),
            'id_glpi_users' => $id_glpi_users,
            'id_glpi_tickets' => $id_glpi_tickets,
        ]);
    }
    //show
    public  function show(Tarea $tarea){



        return view('tarea.show', [
            'tarea'=> $tarea]);

    }
    public function completarTarea(Request $request, Tarea $tarea)
    {
        $tarea->establecerCompletado('terminado');

        return redirect()->back()->with('status', 'Tarea revertida a no completada.');    }

    public function revertirTarea(Request $request, Tarea $tarea)
    {
        // Asegúrate de llamar a un método en tu modelo que actualice el estado correctamente
        $tarea->establecerCompletado('en proceso', null, false);

        // Redirección con mensaje flash
        return redirect()->back()->with('status', 'Tarea revertida a no completada.');
    }
    public function borrarTarea(Request $request, Tarea $tarea)
    {
        // Asegúrate de llamar a un método en tu modelo que actualice el estado correctamente
        $tarea->establecerCompletado('borrado', Carbon::now()->toDateString(), false);

        // Redirección con mensaje flash
        return redirect()->back()->with('status', 'Tarea Borrada no completada.');
    }
    //STORE
    public function store(TareaRequest $request){

        $tarea = Tarea::create($request->validated());
        return redirect()-> route('tareas.index',)
            ->with('success', 'Tarea create Successfully!');
    }
    //UPDATED
    public function update(TareaRequest $request, string $id){
        //$data = $request->validate();
        //$ubicacion = \App\Models\Ubicacion::findOrFail($id);
        //$ubicacion-> nombre = $data['nombre'];
        //$ubicacion-> id_area = $data['id_area'];
        //$ubicacion-> descripcion = $data['descripcion'];
        //$ubicacion->save();
        $tarea = Tarea::findOrFail($id);
        $tarea->update($request->validated());
        return redirect()-> route('tareas.index')
            ->with('success', 'Tarea update Successfully!');
    }
    public function dashboard() {
        $conteoEnProceso = Tarea::where('estado', 'en proceso')->count();
        $conteoEnEspera = Tarea::where('estado', 'en espera')->count();
        $conteoNuevo = Tarea::where('estado', 'nuevo')->count();
        $conteoFinalizado = Tarea::where('estado', 'finalizado')->count();
        $conteoBorrado = Tarea::where('estado', 'borrado')->count();
        $totalTarea = $conteoEnProceso + $conteoEnEspera + $conteoNuevo + $conteoFinalizado +$conteoBorrado;

        $tareas = Tarea::latest()->paginate(10); // Usa get() en lugar de paginate() si es necesario
        $ultimosTarea = Tarea::latest()->take(5)->get();

        // Pasar los conteos a la vista
        return view('tarea.dashboard', compact('totalTarea','conteoEnProceso', 'conteoEnEspera', 'conteoNuevo', 'conteoFinalizado', 'conteoBorrado', 'ultimosTarea', 'tareas'));
    }
    public function getTareaStatus() {
        try {


            $taskCounts = [
                'en_proceso' => Tarea::where('estado', 'en proceso')->count(),
                'en_espera' => Tarea::where('estado', 'en espera')->count(),
                'nuevo' => Tarea::where('estado', 'nuevo')->count(),
                'finalizado' => Tarea::where('estado', 'finalizado')->count(),
                'borrado' => Tarea::where('estado', 'borrado')->count(),
            ];

            return response()->json($taskCounts);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function getTareaByMonthAndStatus(Request $request)
    {
        $filter = $request->query('filter', 'ALL');
        $dateStart = now()->startOfDay();

        $dateEnd = now();

        $query = Tarea::select(
            DB::raw('DAY(fecha_terminado) as dia'),
            DB::raw('MONTH(fecha_terminado) as mes'),
            DB::raw('YEAR(fecha_terminado) as año'),
            'estado',
            DB::raw('COUNT(*) as cantidad')

        )->groupBy('dia', 'mes', 'año', 'estado')->orderBy('año', 'asc')
            ->orderBy('mes', 'asc')
            ->orderBy('dia', 'asc');

        if ($filter !== 'ALL') {
            // Asigna la fecha de inicio basada en el filtro.
            $dateStart = $this->calculateStartDateBasedOnFilter($filter);

            $query->whereBetween('fecha_terminado', [$dateStart, $dateEnd]);
        }

        $tareas = Tarea::select(DB::raw('DAY(fecha_terminado) as dia'), DB::raw('MONTH(fecha_terminado) as mes'), DB::raw('YEAR(fecha_terminado) as año'), 'estado', DB::raw('COUNT(*) as cantidad'))
            ->groupBy('estado', 'dia', 'mes', 'año')->orderBy('año', 'desc')
            ->orderBy('mes', 'desc')
            ->orderBy('dia', 'desc')
            ->when($filter !== 'ALL', function ($query) use ($dateStart) {
                return $query->where('fecha_terminado', '>=', $dateStart);
            })
            ->get();

        return response()->json([
            'tareas' => $tareas
        ]);
    }

    private function calculateStartDateBasedOnFilter($filter)
    {
        switch ($filter) {
            case '1D':
                return now()->startOfDay();
            case '1S':
                return now()->subDays(7)->startOfDay();
            case '1M':
                return now()->subMonth()->startOfMonth();
            case '6M':
                return now()->subMonths(6)->startOfMonth();
            case '1Y':
                return now()->subYear()->startOfDay();
            default:
                return now()->startOfDay();
        }
    }
    public function filterTareasByStatus(Request $request)
    {
        $filter = $request->query('filter', 'ALL');

        if ($filter === 'ALL') {
            $tareas = Tarea::where('estado', '<>', 'borrado')->get();
        } else {
            $tareas = Tarea::where('estado', $filter)->get();
        }

        return response()->json([
            'tareas' => $tareas,
        ]);
    }
    public function filterTareasByStatus1(Request $request)
    {
        $filter = $request->query('filter', 'TODOS');
        $userId = auth()->user()->id; // Asumiendo que estás usando la autenticación de Laravel

        $logsQuery = Log::with('estado_log', 'glpi_users');

        // Si el filtro es 'ALL', no aplicar filtro de estado, pero sí de usuario para "Mi Log"
        if ($filter === 'TODOS') {
            $logsQuery->where('user_id', $userId);
        } else {
            $estado = EstadoLog::where('nombre', $filter)->first();
            $logsQuery->where('id_estado_log', $estado ? $estado->id : null)
                ->where('user_id', $userId); // Asegurarse de que siempre se filtre por el usuario logueado
        }

        $logs = $logsQuery->get(); // Cambiar a paginate si es necesario.

        return response()->json([
            'logs' => $logs,
        ]);
    }

    //delete
    public function destroy(string $id){
        $tarea = Tarea::findOrFail($id);
        $tarea->delete();
        return redirect()-> route('tareas.index')
            ->with('success', 'Tarea Borrado con Exito');
    }
    //toggle-complete
    public function toggle(Tarea $tarea){
        $tarea->toggleComplete();
        if ($tarea->completado) {
            // Si la tarea está completada, redirige al índice.
            return redirect()->route('tareas.index')->with('success', 'Tarea marked as completed successfully!');
        } else {
            // Si la tarea no está completada, puedes elegir mantener al usuario en la misma página
            return back()->with('success', 'Tarea marked as not completed.');
        }}
}
