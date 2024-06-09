<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TipoDocumentacionRequest;
use App\Models\TipoDocumentacion;

class TipoDocumentacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tipo_documentacion.index',[
            'tipo_documentacions'=> TipoDocumentacion::latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tipo_documentacion.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TipoDocumentacionRequest $request)
    {
        //    $data = $request->validate();
        //
        //    $estado_log = new \App\Models\Estado_log;
        //    $estado_log->nombre = $data['nombre'];
        //    $estado_log->descripcion = $data['descripcion'];
        //    $estado_log->save();
        $tipo_documentacion = TipoDocumentacion::create($request->validated());
        return redirect()-> route('tipo_documentacions.show', [$tipo_documentacion->id])
            ->with('success', 'Tipo Creado Satisfactoriamente!');
    }
    public function store1(TipoDocumentacionRequest $request)
    {
        //    $data = $request->validate();
        //
        //    $estado_log = new \App\Models\Estado_log;
        //    $estado_log->nombre = $data['nombre'];
        //    $estado_log->descripcion = $data['descripcion'];
        //    $estado_log->save();
        $tipo_documentacion = TipoDocumentacion::create($request->validated());
        return redirect()-> route('documentacions.index')
            ->with('success', 'Tipo Creado Satisfactoriamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('tipo_documentacion.show', [
            'tipo_documentacion'=> TipoDocumentacion::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('tipo_documentacion.edit', [
            'tipo_documentacion'=> TipoDocumentacion::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TipoDocumentacionRequest $request, string $id)
    {
        //$data = $request->validate();
        //$estado_log = \App\Models\Estado_log::findOrFail($id);
        //$estado_log->nombre = $data['nombre'];
        //$estado_log->descripcion = $data['descripcion'];
        //$estado_log->save();
        $tipo_documentacion = TipoDocumentacion::findOrFail($id);
        $tipo_documentacion->update($request->validated());
        return redirect()-> route('tipo_documentacions.show', [$tipo_documentacion->id])
            ->with('success', 'Tipo Actualizado Satisfactoriamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tipo_documentacion = TipoDocumentacion::findOrFail($id);
        $tipo_documentacion->delete();
        return redirect()-> route('tipo_documentacions.index')
            ->with('success', 'Tipo Documentacion Borrado Satisfactoriamente');
    }
    //toggle-complete
    public function toggle(TipoDocumentacion $tipo_documentacion){
        $tipo_documentacion->toggleComplete();
        if ($tipo_documentacion->completado) {
            // Si la tarea está completada, redirige al índice.
            return redirect()->route('tipo_documentacions.index')->with('success', 'Tipo Documentacion Como Completado Satisfactoriamente!');
        } else {
            // Si la tarea no está completada, puedes elegir mantener al usuario en la misma página
            return back()->with('success', 'Tipo Documentacion Marcado Como no Completado.');
        }
    }

}
