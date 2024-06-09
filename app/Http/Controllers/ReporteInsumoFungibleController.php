<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReporteInsumoFungibleRequest;
use App\Http\Requests\ReporteInsumoInventariadoRequest;
use App\Models\EquipoIt;
use App\Models\GlpiLocations;
use App\Models\GlpiPassivedcequipments;
use App\Models\GlpiTickets;
use App\Models\GlpiUsers;
use App\Models\ReporteInsumoFungible;
use App\Models\ReporteInsumoInventariado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReporteInsumoFungibleController extends Controller
{
    public function index() {
        return view('reporte_insumo_fungible.index',[
            'reporte_insumo_fungibles'=> ReporteInsumoFungible::latest()->paginate(10)]);
    }
    //CREATE
    public function create()
    {
        $glpi_passivedcequipments = GlpiPassivedcequipments::all(); // Obtener todos los insumos de GLPI
        $glpi_users = GlpiUsers::all(); // Obtener todos los usuarios de GLPI
        $glpi_tickets = GlpiTickets::all(); // Obtener todos las ubicaciones de GLPI
        $glpi_locations = GlpiLocations::all(); // Obtener todos las ubicaciones de GLPI
        $equipo_its = EquipoIt::all(); // Obtener todos las ubicaciones de GLPI
        return view('reporte_insumo_fungible.create', compact('equipo_its','glpi_passivedcequipments','glpi_users','glpi_locations', 'glpi_tickets'));
    }
    //edit
    public function edit(String $id){
        $reporte_insumo_fungible = ReporteInsumoFungible::find($id);
        $glpi_passivedcequipments = GlpiPassivedcequipments::all();
        $glpi_users = GlpiUsers::all();
        $glpi_tickets = GlpiTickets::all();
        $glpi_locations = GlpiLocations::all();
        $equipo_its = EquipoIt::all();
        return view('reporte_insumo_fungible.edit', [
            'reporte_insumo_fungible'=>\App\Models\ReporteInsumoFungible::findOrFail($id)
        ], compact('glpi_passivedcequipments','glpi_users','glpi_locations', 'reporte_insumo_fungible','glpi_tickets','equipo_its'));
    }
    //show
    public  function show(string $id){
        $reporte_insumo_fungibles = DB::table('reporte_insumo_fungible as r')
            ->join('glpi_passivedcequipments as gp', 'r.id_glpi_passivedcequipments', '=', 'gp.id')
            ->join('glpi_users as gu', 'r.id_glpi_users', '=', 'gu.id')
            ->join('glpi_tickets as gt', 'r.id_glpi_tickets', '=', 'gt.id')
            ->join('glpi_locations as gl', 'r.id_glpi_locations', '=', 'gl.id')
            ->join('equipo_it as e', 'r.id_equipo_it', '=', 'e.id')
            ->select('r.id as reporte_insumo_fungible_id', 'r.nota as reporte_insumo_fungible_nota','r.descripcion as reporte_insumo_fungible_descripcion','r.fecha_asignacion as reporte_insumo_fungible_fecha_asignacion',
                'r.archivo as reporte_insumo_fungible_archivo','gp.name as glpi_passivedcequipment_name', 'gu.name as glpi_user_name','gt.id as glpi_ticket_id',
                'gt.name as glpi_ticket_name','gl.name as glpi_location_name','r.no_pedido as reporte_insumo_fungible_no_pedido','e.nombre as equipo_it_nombre')
            ->where('r.id', '=', $id)
            ->first();


        return view('reporte_insumo_fungible.show', [
            'reporte_insumo_fungible'=> ReporteInsumofungible::findOrFail($id), 'reporte_insumo_fungibles'=>$reporte_insumo_fungibles]);

    }
    //STORE
    public function store(ReporteInsumoFungibleRequest $request){

        $reporte_insumo_fungible = ReporteInsumoFungible::create($request->validated());

        return redirect()-> route('reporte_insumo_fungibles.show', [$reporte_insumo_fungible->id])
            ->with('success', 'Reporte creado Satisfactoriamente!');
    }
    //UPDATED
    public function update(ReporteInsumoFungibleRequest $request, string $id){
        //$data = $request->validate();
        //$ubicacion = \App\Models\Ubicacion::findOrFail($id);
        //$ubicacion-> nombre = $data['nombre'];
        //$ubicacion-> id_area = $data['id_area'];
        //$ubicacion-> descripcion = $data['descripcion'];
        //$ubicacion->save();
        $reporte_insumo_fungible = ReporteInsumoFungible::findOrFail($id);
        $reporte_insumo_fungible->update($request->validated());
        return redirect()-> route('reporte_insumo_fungibles.show', [$reporte_insumo_fungible->id])
            ->with('success', 'Reporte Insumo Fungible Actualizado Satisfactoriamente!');
    }
    //delete
    public function destroy(string $id){
        $reporte_insumo_fungible = ReporteInsumoFungible::findOrFail($id);
        $reporte_insumo_fungible->delete();
        return redirect()-> route('reporte_insumo_fungibles.index')
            ->with('success', 'Reporte Insumo Fungible Borrado Satisfactoriamente');
    }
    //toggle-complete

}
