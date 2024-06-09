<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReporteInsumoConsumibleRequest;
use App\Models\GlpiLocations;
use App\Models\GlpiPassivedcequipments;
use App\Models\GlpiUsers;
use App\Models\ReporteInsumoConsumible;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReporteInsumoConsumibleController extends Controller
{
    public function index() {
        return view('reporte_insumo_consumible.index',[
            'reporte_insumo_consumibles'=> ReporteInsumoConsumible::latest()->paginate(10)]);
    }
    //CREATE
    public function create()
    {
        $glpi_passivedcequipments = GlpiPassivedcequipments::all(); // Obtener todos los insumos de GLPI
        $glpi_users = GlpiUsers::all(); // Obtener todos los usuarios de GLPI
        $glpi_locations = GlpiLocations::all(); // Obtener todos las ubicaciones de GLPI
        return view('reporte_insumo_consumible.create', compact('glpi_passivedcequipments','glpi_users','glpi_locations'));
    }
    //edit
    public function edit(String $id){
        $reporte_insumo_consumible = ReporteInsumoConsumible::find($id);
        $glpi_passivedcequipments = GlpiPassivedcequipments::all();
        $glpi_users = GlpiUsers::all();
        $glpi_locations = GlpiLocations::all();
        return view('reporte_insumo_consumible.edit', [
            'reporte_insumo_consumible'=>\App\Models\ReporteInsumoConsumible::findOrFail($id)
        ], compact('glpi_passivedcequipments','glpi_users','glpi_locations', 'reporte_insumo_consumible'));
    }
    //show
    public  function show(string $id){
        $reporte_insumo_consumibles = DB::table('reporte_insumo_consumible as r')
            ->join('glpi_passivedcequipments as gp', 'r.id_glpi_passivedcequipments', '=', 'gp.id')
            ->join('glpi_users as gu', 'r.id_glpi_users', '=', 'gu.id')
            ->join('glpi_locations as gl', 'r.id_glpi_locations', '=', 'gl.id')
            ->select('r.id as reporte_insumo_consumible_id', 'r.nota as reporte_insumo_consumible_nota','r.descripcion as reporte_insumo_consumible_descripcion','r.fecha_asignacion as reporte_insumo_consumible_fecha_asignacion',
                'r.no_pedido as reporte_insumo_consumible_no_pedido','gp.name as glpi_passivedcequipment_name', 'gu.name as glpi_user_name','gl.name as glpi_location_name')
            ->where('r.id', '=', $id)
            ->first();


        return view('reporte_insumo_consumible.show', [
            'reporte_insumo_consumible'=> ReporteInsumoConsumible::findOrFail($id), 'reporte_insumo_consumibles'=>$reporte_insumo_consumibles]);

    }
    //STORE
    public function store(ReporteInsumoConsumibleRequest $request){

        $reporte_insumo_consumible = ReporteInsumoConsumible::create($request->validated());
        return redirect()-> route('reporte_insumo_consumibles.show', [$reporte_insumo_consumible->id])
            ->with('success', 'Reporte Insumo Consumible creado Satisfactoriamente!');
    }
    //UPDATED
    public function update(ReporteInsumoConsumibleRequest $request, string $id){
        //$data = $request->validate();
        //$ubicacion = \App\Models\Ubicacion::findOrFail($id);
        //$ubicacion-> nombre = $data['nombre'];
        //$ubicacion-> id_area = $data['id_area'];
        //$ubicacion-> descripcion = $data['descripcion'];
        //$ubicacion->save();
        $reporte_insumo_consumible = ReporteInsumoConsumible::findOrFail($id);
        $reporte_insumo_consumible->update($request->validated());
        return redirect()-> route('reporte_insumo_consumibles.show', [$reporte_insumo_consumible->id])
            ->with('success', 'Reporte Insumo Consumible Actualizado Satisfactoriamente!');
    }
    //delete
    public function destroy(string $id){
        $reporte_insumo_consumible = ReporteInsumoConsumible::findOrFail($id);
        $reporte_insumo_consumible->delete();
        return redirect()-> route('reporte_insumo_consumibles.index')
            ->with('success', 'Reporte Insumo Consumible Borrado Satisfactoriamente');
    }
    //toggle-complete
    public function toggle(ReporteInsumoConsumible $reporte_insumo_consumible){
        $reporte_insumo_consumible->toggleComplete();
        if ($reporte_insumo_consumible->completado) {
            // Si la tarea está completada, redirige al índice.
            return redirect()->route('reporte_insumo_consumibles.index')->with('success', 'Reporte Marcado Como Completado Satisfactoriamente!');
        } else {
            // Si la tarea no está completada, puedes elegir mantener al usuario en la misma página
            return back()->with('success', 'Reporte Marcado como no completado.');
        }}
}
