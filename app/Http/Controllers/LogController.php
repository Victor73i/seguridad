<?php

namespace App\Http\Controllers;

use App\Models\EquipoIt;
use Illuminate\Support\Arr;

use App\Models\EstadoLog;
use App\Models\GlpiLocations;
use App\Models\GlpiTickets;
use App\Models\GlpiUsers;
use App\Models\LogEquipoIt;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Area;
use App\Models\Categoria_insumo;
use App\Models\Documentacion;
use App\Models\Equipo_computo;
use App\Models\Estado_equipo_computo;
use App\Models\Estado_insumo;
use App\Models\Estado_log;
use App\Models\Estado_mantenimiento_equipo;
use App\Models\Insumo_mantenimiento_equipo;
use App\Models\Insumo;
use App\Models\Ip_equipo_computo;
use App\Models\Log;
use App\Models\Mantenimiento_equipo;
use App\Models\Rol_usuario;
use App\Models\Tipo_documentacion;
use App\Models\Tipo_equipo_computo;
use App\Models\Tipo_mantenimiento_equipo;
use App\Models\Ubicacion;
use App\Models\Usuario;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\TaskRequest;
use App\Http\Requests\AreaRequest;
use App\Http\Requests\Categoria_insumoRequest;
use App\Http\Requests\DocumentacionRequest;
use App\Http\Requests\Equipo_computoRequest;
use App\Http\Requests\Estado_equipo_computoRequest;
use App\Http\Requests\Estado_insumoRequest;
use App\Http\Requests\Estado_logRequest;
use App\Http\Requests\Estado_mantenimiento_equipoRequest;
use App\Http\Requests\InsumoRequest;
use App\Http\Requests\Insumo_mantenimiento_equipoRequest;
use App\Http\Requests\Ip_equipo_computoRequest;
use App\Http\Requests\LogRequest;
use App\Http\Requests\Mantenimiento_equipoRequest;
use App\Http\Requests\Rol_usuarioRequest;
use App\Http\Requests\Tipo_documentacionRequest;
use App\Http\Requests\Tipo_equipo_computoRequest;
use App\Http\Requests\Tipo_mantenimiento_equipoRequest;
use App\Http\Requests\UbicacionRequest;
use App\Http\Requests\UsuarioRequest;
use Carbon\Carbon;

class LogController extends Controller
{

    //index
    public function index(Request $request) {
        $query = Log::query();

        // Revisa si el request tiene búsqueda por título
        if ($request->filled('search')) {
            $query->where('titulo', 'like', '%' . $request->search . '%');
            // Asegúrate de agregar más campos si quieres buscar en más columnas
        }
        // Revisa si el request tiene un filtro de fecha
        if ($request->filled('filter_date')) {
            switch ($request->filter_date) {
                case 'Today':
                    $query->whereDate('fecha_inicio', Carbon::today());
                    break;
                case 'Yesterday':
                    $query->whereDate('fecha_inicio', Carbon::yesterday());
                    break;
                case 'Last 7 Days':
                    $query->whereDate('fecha_inicio', '>=', Carbon::today()->subDays(7));
                    break;
                case 'Last 30 Days':
                    $query->whereDate('fecha_inicio', '>=', Carbon::today()->subDays(30));
                    break;
                case 'This Month':
                    $query->whereMonth('fecha_inicio', Carbon::today()->month);
                    break;
                case 'This Year':
                    $query->whereYear('fecha_iniciot', Carbon::now()->year);
                    break;
                case 'All':
                    // No es necesario añadir ningún filtro
                    break;
            }
        }

        $logs = $query->latest()->paginate(10);
        return view('log.index', compact('logs'));
    }
    public function index1() {
        return view('apps-projects-list',[
            'logs'=> Log::latest()->paginate(10)]);
    }
    //create
    public function create() {
        $equiposIt = EquipoIt::all();
        $id_glpi_users = GlpiUsers::all();
        $id_glpi_locations = GlpiLocations::all();
        $id_glpi_tickets = GlpiTickets::all();
        $id_estado_logs = EstadoLog::all();

        return view('log.create', [
            'equipos_it' => $equiposIt,
            'id_glpi_users' => $id_glpi_users,
            'id_glpi_locations' => $id_glpi_locations,
            'id_glpi_tickets' => $id_glpi_tickets,
            'id_estado_logs' => $id_estado_logs
        ]);
    }
    //edit
    public function edit(string $id) {
        // Obtén el log y sus archivos
        $log = Log::findOrFail($id);
        $existingFiles = explode(',', $log->archivo);

        $equiposIt = EquipoIt::all();
        $id_glpi_users = GlpiUsers::all();
        $id_glpi_locations = GlpiLocations::all();
        $id_glpi_tickets = GlpiTickets::all();
        $id_estado_logs = EstadoLog::all();

        // Pasa los archivos existentes y otros datos necesarios a la vista
        return view('log.edit', [
            'log' => $log,
            'existingFiles' => $existingFiles,
            'equipos_it' => $equiposIt,
            'id_glpi_users' => $id_glpi_users,
            'id_glpi_locations' => $id_glpi_locations,
            'id_glpi_tickets' => $id_glpi_tickets,
            'id_estado_logs' => $id_estado_logs,
            // Agregar cualquier otro dato que necesites pasar a la vista...
        ]);
    }


    //show
    public function show(Log $log){
        return view('log.show', [
            'log'=> $log
        ]);
    }
    //STORE
    public function store(LogRequest $request) {
        // Valida y obtiene todos los datos del formulario excepto los archivos
        $validatedData = $request->validated();

        // Manejo de la subida de archivos
        $filenames = [];
        if ($request->hasFile('archivo')) {
            foreach ($request->file('archivo') as $file) {
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('log/archivo'), $filename);
                $filenames[] = $filename;
            }
        }

        // Si hay archivos, los almacena como una cadena de nombres de archivo separados por comas
        if (!empty($filenames)) {
            $validatedData['archivo'] = implode(',', $filenames);
        } else {
            $validatedData['archivo'] = null; // O manejar de otra forma si es necesario
        }

        // Crea el log con los datos validados
        $log = Log::create($validatedData);

        // Asocia equipos de IT si se enviaron
        $ids_equipo_it = $request->input('id_equipo_computo', []);
        foreach ($ids_equipo_it as $id_equipo_it) {
            $log_equipo_it = new LogEquipoIt();
            $log_equipo_it->id_log = $log->id;
            $log_equipo_it->id_equipo_it = $id_equipo_it;
            $log_equipo_it->save();
        }

        return redirect()->route('logs.show', [$log->id])
            ->with('success', 'Log creado correctamente.');
    }



    //UPDATE
    public function update(LogRequest $request, string $id) {
        $log = Log::findOrFail($id);

        // Valida y obtiene todos los datos del formulario excepto los archivos
        $validatedData = $request->validated();

        // Manejo de la subida de archivos
        $filenames = $log->archivo ? explode(',', $log->archivo) : [];
        if ($request->hasFile('archivo')) {
            foreach ($request->file('archivo') as $file) {
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('log/archivo'), $filename);
                $filenames[] = $filename;
            }
        }

        // Si hay nuevos archivos, actualiza la propiedad 'archivo' con los nombres de archivo
        $validatedData['archivo'] = implode(',', $filenames);

        // Actualiza el log con los nuevos datos
        $logData = Arr::except($validatedData, ['id_equipo_computo']);
        $log->update($logData);

        // Actualiza la relación de equipos de IT si se enviaron
        $log->equiposIt()->sync($request->input('id_equipo_computo', []));

        return redirect()->route('logs.show', [$log->id])
            ->with('success', 'Log actualizado correctamente.');
    }
    public function removeFile(Request $request, $id) {
        $log = Log::findOrFail($id);

        // Separar la cadena de archivos en un array
        $existingFiles = explode(',', $log->archivo ?? '');

        // Eliminar el archivo del array si existe
        $fileToRemove = $request->input('file_to_remove');
        if (($key = array_search($fileToRemove, $existingFiles)) !== false) {
            // Eliminar el archivo del servidor si existe
            $filePath = public_path('log/archivo/' . $fileToRemove);
            if (file_exists($filePath)) {
                @unlink($filePath);
            }
            // Eliminar el archivo del array y reindexar
            array_splice($existingFiles, $key, 1);
        }

        // Filtrar el array para remover entradas vacías y convertirlo a cadena
        $existingFiles = array_filter($existingFiles, function($file) { return trim($file) !== ''; });
        $log->archivo = implode(',', $existingFiles);
        $log->save();

        return back()->with('success', 'Archivo eliminado correctamente.');
    }




    public function dashboard() {

    $logs = Log::latest()->paginate(10); // Usa get() en lugar de paginate()
    $ultimosLog = Log::latest()->take(5)->get();


    return view('log.dashboard', compact(  'ultimosLog', 'logs'  ));
}


    public function getLogStatus() {
        try {
            $estados = EstadoLog::withCount('logs')->get();
            return response()->json([
                'estados' => $estados,

            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function getLogByMonthAndStatus(Request $request)
    {
        $filter = $request->query('filter', 'ALL');
        $dateEnd = now(); // La fecha de finalización siempre será "ahora".
        $dateStart = now()->startOfDay(); // Por defecto establece la fecha de inicio al comienzo del día actual.

        $query = Log::select(
            DB::raw('DAY(fecha_finalizacion) as dia'),
            DB::raw('MONTH(fecha_finalizacion) as mes'),
            DB::raw('YEAR(fecha_finalizacion) as año'),
            'id_estado_log',
            DB::raw('COUNT(*) as cantidad')
        )
            ->join('estado_log', 'estado_log.id', '=', 'log.id_estado_log')
            ->addSelect('estado_log.nombre as nombre_estado');

        if ($filter !== 'ALL') {
            $dateEnd = now(); // Define la fecha de fin como la fecha y hora actual

            switch ($filter) {
                case '1D':
                    $dateStart = now()->startOfDay(); // Inicia en el comienzo del día actual.
                    break;
                case '1S':
                    $dateStart = now()->subDays(7)->startOfDay(); // Resta 7 días para obtener la semana.
                    break;
                case '1M':
                    $dateStart = now()->subMonth()->startOfMonth();
                    break;
                case '6M':
                    $dateStart = now()->subMonths(6)->startOfMonth();
                    break;
                case '1Y':
                    $dateStart = now()->subYear()->startOfDay();
                    break;
                // Asegúrate de tener una opción predeterminada en caso de que `$filter` no coincida con ninguno de los casos.
                default:
                    $dateStart = now()->startOfDay();
                    break;
            }
            $query->where('fecha_finalizacion', '>=', $dateStart)->where('fecha_finalizacion', '<=', $dateEnd);
        }

        $estados = EstadoLog::select('id', 'nombre')->get();


        $totalsByDate = clone $query;
        $totalsByDate = $totalsByDate->select(
            DB::raw('DAY(fecha_finalizacion) as dia'),
            DB::raw('MONTH(fecha_finalizacion) as mes'),
            DB::raw('YEAR(fecha_finalizacion) as año'),
            DB::raw('COUNT(*) as total')
        )
            ->groupBy('dia', 'mes', 'año')
            ->orderBy('año', 'desc')
            ->orderBy('mes', 'desc')
            ->orderBy('dia', 'desc')
            ->get();
// Añade los nombres de los estados a los logs
        $loges = $query->groupBy('dia', 'mes', 'año', 'id_estado_log')
            ->orderBy('año', 'desc')
            ->orderBy('mes', 'desc')
            ->orderBy('dia', 'desc')
            ->get()->map(function ($item) use ($estados) {
                $estado = $estados->firstWhere('id', $item->id_estado_log);
                $item->nombre_estado = $estado ? $estado->nombre : null;
                return $item;
            });
        return response()->json([
            'loges' => $loges,
            'totalsByDate' => $totalsByDate, // Asegúrate de agregar esto
            'estados' => $estados
        ]);
    }

    public function filterLogsByStatus(Request $request)
    {
        $filter = $request->query('filter', 'ALL');

        $logsQuery = Log::with('estado_log', 'glpi_users');

        if ($filter !== 'ALL') {
            $estado = EstadoLog::where('nombre', $filter)->first();
            $logsQuery->where('id_estado_log', $estado ? $estado->id : null);
        }

        $logs = $logsQuery->get(); // Cambiar a paginate si es necesario.

        return response()->json([
            'logs' => $logs,
        ]);
    }
    public function filterLogsByStatus1(Request $request)
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
        $log = Log::findOrFail($id);

        // Primero, elimina todas las referencias de este log en la tabla log_equipo_it
        LogEquipoIt::where('id_log', $log->id)->delete();

        // Ahora puedes eliminar el log de manera segura
        $log->delete();

        return redirect()->route('logs.index')->with('success', 'Log Deleted Successfully');
    }
    //toggle-complete
    public function toggle(Log $log){
        $log->toggleComplete();
        if ($log->completado) {
            // Si la tarea está completada, redirige al índice.
            return redirect()->route('logs.index')->with('success', 'Log marked as completed successfully!');
        } else {
            // Si la tarea no está completada, puedes elegir mantener al usuario en la misma página
            return back()->with('success', 'Log marked as not completed.');
        }
    }
}
