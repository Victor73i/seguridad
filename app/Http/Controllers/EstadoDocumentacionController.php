<?php

namespace App\Http\Controllers;

use App\Http\Requests\EstadoDocumentacionRequest;
use App\Models\EstadoDocumentacion;
use Illuminate\Http\Request;

class EstadoDocumentacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('estado_documentacion.index',[
            'estado_documentacions'=> EstadoDocumentacion::latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('estado_documentacion.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EstadoDocumentacionRequest $request)
    {
        //    $data = $request->validate();
        //
        //    $estado_log = new \App\Models\Estado_log;
        //    $estado_log->nombre = $data['nombre'];
        //    $estado_log->descripcion = $data['descripcion'];
        //    $estado_log->save();
        $estado_documentacion = EstadoDocumentacion::create($request->validated());
        return redirect()-> route('estado_documentacions.show', [$estado_documentacion->id])
            ->with('success', 'Estado Creado Satisfactoriamente!');
    }
    public function store1(EstadoDocumentacionRequest $request)
    {
        //    $data = $request->validate();
        //
        //    $estado_log = new \App\Models\Estado_log;
        //    $estado_log->nombre = $data['nombre'];
        //    $estado_log->descripcion = $data['descripcion'];
        //    $estado_log->save();
        $estado_documentacion = EstadoDocumentacion::create($request->validated());
        return redirect()-> route('documentacions.index')
            ->with('success', 'Estado Creado Satisfactoriamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('estado_documentacion.show', [
            'estado_documentacion'=> EstadoDocumentacion::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('estado_documentacion.edit', [
            'estado_documentacion'=> EstadoDocumentacion::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EstadoDocumentacionRequest $request, string $id)
    {
        //$data = $request->validate();
        //$estado_log = \App\Models\Estado_log::findOrFail($id);
        //$estado_log->nombre = $data['nombre'];
        //$estado_log->descripcion = $data['descripcion'];
        //$estado_log->save();
        $estado_documentacion = EstadoDocumentacion::findOrFail($id);
        $estado_documentacion->update($request->validated());
        return redirect()-> route('estado_documentacions.show', [$estado_documentacion->id])
            ->with('success', 'Estado Actualizado Satisfactoriamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $estado_documentacion = EstadoDocumentacion::findOrFail($id);
        $estado_documentacion->delete();
        return redirect()-> route('estado_documentacions.index')
            ->with('success', 'Estado Documentacion Borrado Satisfactoriamente');
    }
    //toggle-complete
    public function toggle(EstadoDocumentacion $id){
        $id->toggleComplete();
        if ($id->completado) {
            // Si la tarea está completada, redirige al índice.
            return redirect()->route('estado_documentacions.index')->with('success', 'Estado Documentacion Como Completado Satisfactoriamente!');
        } else {
            // Si la tarea no está completada, puedes elegir mantener al usuario en la misma página
            return back()->with('success', 'Estado Documentacion Marcado Como no Completado.');
        }}
}
