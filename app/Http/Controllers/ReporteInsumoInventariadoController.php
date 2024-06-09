<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReporteInsumoInventariadoRequest;
use App\Models\GlpiLocations;
use App\Models\GlpiPassivedcequipments;
use App\Models\GlpiTickets;
use App\Models\GlpiUsers;
use App\Models\ReporteInsumoInventariado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ReporteInsumoInventariadoController extends Controller
{
    public function index() {
        return view('reporte_insumo_inventariado.index',[
            'reporte_insumo_inventariados'=> ReporteInsumoInventariado::latest()->paginate(10)]);
    }
    //CREATE
    public function create()
    {
        $glpi_passivedcequipments = GlpiPassivedcequipments::all(); // Obtener todos los insumos de GLPI
        $glpi_users = GlpiUsers::all(); // Obtener todos los usuarios de GLPI
        $glpi_tickets = GlpiTickets::all(); // Obtener todos las ubicaciones de GLPI
        $glpi_locations = GlpiLocations::all(); // Obtener todos las ubicaciones de GLPI
        return view('reporte_insumo_inventariado.create', compact('glpi_passivedcequipments','glpi_users','glpi_locations', 'glpi_tickets'));
    }
    //edit
    public function edit(String $id){
        $reporte_insumo_inventariado = ReporteInsumoInventariado::find($id);
        $glpi_passivedcequipments = GlpiPassivedcequipments::all();
        $glpi_users = GlpiUsers::all();
        $glpi_tickets = GlpiTickets::all();
        $glpi_locations = GlpiLocations::all();
        return view('reporte_insumo_inventariado.edit', [
            'reporte_insumo_inventariado'=>\App\Models\ReporteInsumoInventariado::findOrFail($id)
        ], compact('glpi_passivedcequipments','glpi_users','glpi_locations', 'reporte_insumo_inventariado','glpi_tickets'));
    }
    //show
    public  function show(string $id){
        $reporte_insumo_inventariados = DB::table('reporte_insumo_inventariado as r')
            ->join('glpi_passivedcequipments as gp', 'r.id_glpi_passivedcequipments', '=', 'gp.id')
            ->join('glpi_users as gu', 'r.id_glpi_users', '=', 'gu.id')
            ->join('glpi_tickets as gt', 'r.id_glpi_tickets', '=', 'gt.id')
            ->join('glpi_locations as gl', 'r.id_glpi_locations', '=', 'gl.id')
            ->select('r.id as reporte_insumo_inventariado_id', 'r.nota as reporte_insumo_inventariado_nota','r.descripcion as reporte_insumo_inventariado_descripcion','r.fecha_asignacion as reporte_insumo_inventariado_fecha_asignacion',
                'r.archivo as reporte_insumo_inventariado_archivo','gp.name as glpi_passivedcequipment_name', 'gu.name as glpi_user_name','gt.id as glpi_ticket_id','gt.name as glpi_ticket_name','gl.name as glpi_location_name')
            ->where('r.id', '=', $id)
            ->first();


        return view('reporte_insumo_inventariado.show', [
            'reporte_insumo_inventariado'=> ReporteInsumoInventariado::findOrFail($id), 'reporte_insumo_inventariados'=>$reporte_insumo_inventariados]);

    }
    //STORE
    public function store(ReporteInsumoInventariadoRequest $request){

        $reporte_insumo_inventariado = ReporteInsumoInventariado::create($request->validated());
        return redirect()-> route('reporte_insumo_inventariados.show', [$reporte_insumo_inventariado->id])
            ->with('success', 'Reporte creado Satisfactoriamente!');
    }
    //UPDATED
    public function update(ReporteInsumoInventariadoRequest $request, string $id){
        //$data = $request->validate();
        //$ubicacion = \App\Models\Ubicacion::findOrFail($id);
        //$ubicacion-> nombre = $data['nombre'];
        //$ubicacion-> id_area = $data['id_area'];
        //$ubicacion-> descripcion = $data['descripcion'];
        //$ubicacion->save();
        $reporte_insumo_inventariado = ReporteInsumoInventariado::findOrFail($id);
        $reporte_insumo_inventariado->update($request->validated());
        return redirect()-> route('reporte_insumo_inventariados.show', [$reporte_insumo_inventariado->id])
            ->with('success', 'Reporte Insumo Inventariado Actualizado Satisfactoriamente!');
    }
    //delete
    public function destroy(string $id){
        $reporte_insumo_inventariado = ReporteInsumoInventariado::findOrFail($id);
        $reporte_insumo_inventariado->delete();
        return redirect()-> route('reporte_insumo_inventariados.index')
            ->with('success', 'Reporte Insumo Inventariado Borrado Satisfactoriamente');
    }
    //toggle-complete
    public function toggle(ReporteInsumoInventariado $reporte_insumo_inventariado){
        $reporte_insumo_inventariado->toggleComplete();
        if ($reporte_insumo_inventariado->completado) {
            // Si la tarea está completada, redirige al índice.
            return redirect()->route('reporte_insumo_inventariados.index')->with('success', 'Reporte Marcado Como Completado Satisfactoriamente!');
        } else {
            // Si la tarea no está completada, puedes elegir mantener al usuario en la misma página
            return back()->with('success', 'Reporte Marcado como no completado.');
        }}
}
