<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentacionRequest;
use App\Models\CategoriaDocumentacion;
use App\Models\EstadoDocumentacion;
use App\Models\GlpiTickets;
use App\Models\GlpiUsers;
use App\Models\TipoDocumentacion;
use Illuminate\Http\Request;
use App\Models\Documentacion;
use Illuminate\Support\Facades\DB;


class DocumentacionController extends Controller
{
    //index
    public function index() {

        $id_glpi_users = GlpiUsers::all();
        $id_estado_documentacion = EstadoDocumentacion::all();
        $id_categoria_documentacion = CategoriaDocumentacion::all();
        $id_tipo_documentacion = TipoDocumentacion::all();
        return view('documentacion.index',[
            'documentacions'=> Documentacion::latest()->paginate(10),
            'id_glpi_users' => $id_glpi_users,
            'id_estado_documentacion' => $id_estado_documentacion,
            'id_categoria_documentacion' => $id_categoria_documentacion,
            'id_tipo_documentacion' => $id_tipo_documentacion,
            ]);

    }
    //CREATE
    public function create()
    {

        $id_glpi_users = GlpiUsers::all();
        $id_estado_documentacion = EstadoDocumentacion::all();
        $id_tipo_documentacion = TipoDocumentacion::all();
        $id_categoria_documentacion = CategoriaDocumentacion::all();


        return view('documentacion.create',[
            'id_glpi_users' => $id_glpi_users,
            'id_estado_documentacion' => $id_estado_documentacion,
            'id_tipo_documentacion' => $id_tipo_documentacion,
            'id_categoria_documentacion' => $id_categoria_documentacion,
        ]);
    }
    //edit
    public function edit(String $id){
        $documentacion = Documentacion::findOrFail($id);
        $existingFiles = explode(',', $documentacion->archivo ?? '');
        $id_glpi_users = GlpiUsers::all();
        $id_estado_documentacion = EstadoDocumentacion::all();
        $id_tipo_documentacion = TipoDocumentacion::all();
        $id_categoria_documentacion = CategoriaDocumentacion::all();

        return view('documentacion.edit', [
            'documentacion' => $documentacion,
            'existingFiles' => $existingFiles, // Asegúrate de que esta variable se pasa correctamente a la vista
            'id_glpi_users' => $id_glpi_users,
            'id_estado_documentacion' => $id_estado_documentacion,
            'id_tipo_documentacion' => $id_tipo_documentacion,
            'id_categoria_documentacion' => $id_categoria_documentacion,
        ]);
    }

    //show
    public  function show(Documentacion $documentacion){



        return view('documentacion.show', [
            'documentacion' => $documentacion]);

    }
    //STORE
    public function store(DocumentacionRequest $request)
    {
        $validatedData = $request->validated();
        $filenames = [];

        if ($request->hasFile('archivo')) {
            $files = $request->file('archivo');

            foreach ($files as $file) {
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('documentacion/archivo'), $filename);
                $filenames[] = $filename;
            }

            // Guarda los nombres de archivo como una cadena separada por comas o como un array serializado
            $validatedData['archivo'] = implode(',', $filenames); // Como cadena separada por comas
            // O puedes guardar como JSON
            // $validatedData['archivo'] = json_encode($filenames);
        }

        $documentacion = Documentacion::create($validatedData);
        return redirect()->route('documentacions.index')->with('success', 'Documentación creada Satisfactoriamente!');
    }


    //UPDATED
    public function update(DocumentacionRequest $request, string $id)
    {
        $documentacion = Documentacion::findOrFail($id);
        $validatedData = $request->validated();

        if ($request->hasFile('archivo')) {
            $filenames = explode(',', $documentacion->archivo ?? ''); // Obtiene los archivos existentes

            foreach ($request->file('archivo') as $file) {
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('documentacion/archivo'), $filename);
                $filenames[] = $filename;
            }

            $validatedData['archivo'] = implode(',', $filenames); // Actualiza el listado de archivos
        }

        $documentacion->update($validatedData);

        return redirect()->route('documentacions.index')->with('success', 'Documentación actualizada satisfactoriamente.');
    }
    public function dashboard() {

        $documentacions = Documentacion::latest()->paginate(10); // Usa get() en lugar de paginate()
        $ultimosDocumentacion = Documentacion::latest()->take(5)->get();


        return view('documentacion.dashboard', compact(  'ultimosDocumentacion', 'documentacions',  ));
    }


    public function getDocumentacionStatus() {
        try {
            $estados = EstadoDocumentacion::withCount('documentacions')->get();
            $tipos = TipoDocumentacion::withCount('documentacions')->get();
            $categorias = CategoriaDocumentacion::withCount('documentacions')->get();
            return response()->json([
                'estados' => $estados,
                'tipos' => $tipos,
                'categorias' => $categorias
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function getDocumentacionByMonthAndStatus(Request $request)
    {
        $filter = $request->query('filter', 'ALL');
        $dateEnd = now(); // La fecha de finalización siempre será "ahora".
        $dateStart = now()->startOfDay(); // Por defecto establece la fecha de inicio al comienzo del día actual.

        $query = Documentacion::select(
            DB::raw('DAY(fecha_creacion) as dia'),
            DB::raw('MONTH(fecha_creacion) as mes'),
            DB::raw('YEAR(fecha_creacion) as año'),
            'id_estado_documentacion',
            DB::raw('COUNT(*) as cantidad')
        )
            ->join('estado_documentacion', 'estado_documentacion.id', '=', 'documentacion.id_estado_documentacion')
            ->addSelect('estado_documentacion.nombre as nombre_estado');

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
            $query->where('fecha_creacion', '>=', $dateStart)->where('fecha_creacion', '<=', $dateEnd);
        }

        $estados = EstadoDocumentacion::select('id', 'nombre')->get();


        $totalsByDate = clone $query;
        $totalsByDate = $totalsByDate->select(
            DB::raw('DAY(fecha_creacion) as dia'),
            DB::raw('MONTH(fecha_creacion) as mes'),
            DB::raw('YEAR(fecha_creacion) as año'),
            DB::raw('COUNT(*) as total')
        )
            ->groupBy('dia', 'mes', 'año')
            ->orderBy('año', 'desc')
            ->orderBy('mes', 'desc')
            ->orderBy('dia', 'desc')
            ->get();
// Añade los nombres de los estados a las documentaciones
        $documentaciones = $query->groupBy('dia', 'mes', 'año', 'id_estado_documentacion')
            ->orderBy('año', 'desc')
            ->orderBy('mes', 'desc')
            ->orderBy('dia', 'desc')
            ->get()->map(function ($item) use ($estados) {
            $estado = $estados->firstWhere('id', $item->id_estado_documentacion);
            $item->nombre_estado = $estado ? $estado->nombre : null;
            return $item;
        });
        return response()->json([
            'documentaciones' => $documentaciones,
            'totalsByDate' => $totalsByDate, // Asegúrate de agregar esto
            'estados' => $estados
        ]);
    }
    //delete
    public function destroy(string $id){
        $documentacion = Documentacion::findOrFail($id);
        $documentacion->delete();
        return redirect()-> route('documentacions.index')
            ->with('success', 'Documentacion Borrado Satisfactoriamente');
    }
    //toggle-complete
    public function removeFile(Request $request, $id) {
        $documentacion = Documentacion::findOrFail($id);

        // Separar la cadena de archivos en un array
        $existingFiles = explode(',', $documentacion->archivo ?? '');

        // Eliminar el archivo del array si existe
        $fileToRemove = $request->input('file_to_remove');
        if (($key = array_search($fileToRemove, $existingFiles)) !== false) {
            // Eliminar el archivo del servidor si existe
            $filePath = public_path('documentacion/archivo/' . $fileToRemove);
            if (file_exists($filePath)) {
                @unlink($filePath);
            }
            // Eliminar el archivo del array y reindexar
            array_splice($existingFiles, $key, 1);
        }

        // Filtrar el array para remover entradas vacías y convertirlo a cadena
        $existingFiles = array_filter($existingFiles, function($file) { return trim($file) !== ''; });
        $documentacion->archivo = implode(',', $existingFiles);
        $documentacion->save();

        return back()->with('success', 'Documentacion eliminado correctamente.');
    }
    public function toggle(Documentacion $documentacion){
        $documentacion->toggleComplete();
        if ($documentacion->completado) {
            // Si la tarea está completada, redirige al índice.
            return redirect()->route('documentacions.index')->with('success', 'Documentacion Marcado Como Completado Satisfactoriamente!');
        } else {
            // Si la tarea no está completada, puedes elegir mantener al usuario en la misma página
            return back()->with('success', 'Documentacion Marcado como no completado.');
        }}

}
