<?php

namespace App\Http\Controllers;

use App\Http\Requests\EquipoItRequest;
use App\Models\EquipoIt;
use Illuminate\Http\Request;

class EquipoItController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $equiposIt = EquipoIt::latest()->get(); // Usa get() en lugar de paginate()
        return view('equipo_it.index', [
            'equiposIt' => $equiposIt
        ]);
    }

    public function detalles($id)
    {
        $equipoIt = EquipoIt::with(['glpiComputers', 'glpiPdus', 'glpiPrinters'])->findOrFail($id);
        $nombre_equipo = '';


        if ($equipoIt->glpiComputers) {
            $nombre_equipo = $equipoIt->glpiComputers->name;
        } elseif ($equipoIt->glpiPdus) {
            $nombre_equipo = $equipoIt->glpiPdus->name;
        } elseif ($equipoIt->glpiPrinters) {
            $nombre_equipo = $equipoIt->glpiPrinters->name;
        }

        return response()->json([
            'nombre' => $equipoIt->nombre,
            'type' => $equipoIt->type,
            'nombre_equipo' => $nombre_equipo,
        ]);
    }
    public function dashboard() {
        $conteoComputadoras = EquipoIt::where('type', 'computer')->count();
        $conteoImpresoras = EquipoIt::where('type', 'impresora')->count();
        $conteoPdus = EquipoIt::where('type', 'pdu')->count();
        $totalEquiposIT = $conteoComputadoras + $conteoImpresoras + $conteoPdus;
        $equiposIt = EquipoIt::latest()->paginate(10); // Usa get() en lugar de paginate()
        $ultimosEquiposIt = EquipoIt::latest()->take(5)->get();


        return view('equipo_it.dashboard', compact('conteoComputadoras', 'conteoImpresoras', 'ultimosEquiposIt', 'equiposIt', 'conteoPdus', 'totalEquiposIT'));
    }


    public function getEquipoItStatus() {
        $conteoComputadoras = EquipoIt::where('type', 'computer')->count();
        $conteoImpresoras = EquipoIt::where('type', 'impresora')->count();
        $conteoPdus = EquipoIt::where('type', 'pdu')->count();

        return response()->json([
            'conteoComputadoras' => $conteoComputadoras,
            'conteoImpresoras' => $conteoImpresoras,
            'conteoPdus' => $conteoPdus
        ]);
    }
    /**
     * Display the specified resource.
     */
    public function show(EquipoIt $equipoIt)
    {
        return view('equipo_it.show', [
            'equipoIt'=> $equipoIt
        ]);
    }

    public function filter(string $search)
    {
        $equipos_it = EquipoIt::where('name', 'LIKE', '%'.$search.'%')->orWhere('id', 'LIKE', '%'.$search.'%')->limit(10)->get();

        return redirect()->back()->with($equipos_it);
    }

    /**
     * Show the form for creating a new resource.
     */
    /*
    public function create()
    {
        return view('equipo_it.create');
    }
    */

    /**
     * Store a newly created resource in storage.
     */
    /*
    public function store(EquipoItRequest $request)
    {
        $equipoIt = EquipoIt::create($request->validated());
        return redirect()-> route('equipo_it.show', [$equipoIt->id])
            ->with('success', 'Equpo IT create Successfully!');
    }
    */

    /**
     * Show the form for editing the specified resource.
     */
    /*
    public function edit(EquipoIt $equipoIt)
    {
        return view('equipo_it.edit', [
            'equipo_it'=> EquipoIt::findOrFail($equipoIt)
        ]);
    }
    */

    /**
     * Update the specified resource in storage.
     */
    /*
    public function update(EquipoItRequest $request, EquipoIt $equipoIt)
    {
        $equipoIt->update($request->validated());
        return redirect()-> route('equipo_it.show', [$equipoIt->id])
            ->with('success', 'Equipo IT update Successfully!');
    }
    */

    /**
     * Remove the specified resource from storage.
     */
    /*
    public function destroy(EquipoIt $equipoIt)
    {
        $equipoIt->delete();
        return redirect()-> route('equipo_it.index')
            ->with('success', 'Equipo IT Deleted Successfully');
    }
    */

    //toggle-complete
    /*
    public function toggle(EquipoIt $equipoIt){
        $equipoIt->toggleComplete();
        if ($equipoIt->completado) {
            // Si la tarea está completada, redirige al índice.
            return redirect()->route('equipo_it.index')->with('success', 'Equipo IT marked as completed successfully!');
        } else {
            // Si la tarea no está completada, puedes elegir mantener al usuario en la misma página
            return back()->with('success', 'Equipo IT marked as not completed.');
        }
    }
    */
}
