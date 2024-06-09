<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoriaDocumentacionRequest;
use App\Models\CategoriaDocumentacion;
use Illuminate\Http\Request;

class CategoriaDocumentacionController extends Controller
{
    public function index()
    {
        return view('categoria_documentacion.index',[
            'categoria_documentacions'=> CategoriaDocumentacion::latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categoria_documentacion.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoriaDocumentacionRequest $request)
    {
        //    $data = $request->validate();
        //
        //    $estado_log = new \App\Models\Estado_log;
        //    $estado_log->nombre = $data['nombre'];
        //    $estado_log->descripcion = $data['descripcion'];
        //    $estado_log->save();
        $categoria_documentacion = CategoriaDocumentacion::create($request->validated());
        return redirect()-> route('categoria_documentacions.show', [$categoria_documentacion->id])
            ->with('success', 'Categoria Creado Satisfactoriamente!');
    }
    public function store1(CategoriaDocumentacionRequest $request)
    {
        //    $data = $request->validate();
        //
        //    $estado_log = new \App\Models\Estado_log;
        //    $estado_log->nombre = $data['nombre'];
        //    $estado_log->descripcion = $data['descripcion'];
        //    $estado_log->save();
        $categoria_documentacion = CategoriaDocumentacion::create($request->validated());
        return redirect()-> route('documentacions.index')
            ->with('success', 'Categoria Creado Satisfactoriamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('categoria_documentacion.show', [
            'categoria_documentacion'=> CategoriaDocumentacion::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('categoria_documentacion.edit', [
            'categoria_documentacion'=> CategoriaDocumentacion::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoriaDocumentacionRequest $request, string $id)
    {
        //$data = $request->validate();
        //$estado_log = \App\Models\Estado_log::findOrFail($id);
        //$estado_log->nombre = $data['nombre'];
        //$estado_log->descripcion = $data['descripcion'];
        //$estado_log->save();
        $categoria_documentacion = CategoriaDocumentacion::findOrFail($id);
        $categoria_documentacion->update($request->validated());
        return redirect()-> route('categoria_documentacions.show', [$categoria_documentacion->id])
            ->with('success', 'Categoria Actualizado Satisfactoriamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categoria_documentacion = CategoriaDocumentacion::findOrFail($id);
        $categoria_documentacion->delete();
        return redirect()-> route('categoria_documentacions.index')
            ->with('success', 'Categoria Documentacion Borrado Satisfactoriamente');
    }
    //toggle-complete
    public function toggle(CategoriaDocumentacion $categoriaDocumentacion){
        $categoriaDocumentacion->toggleComplete();
        if ($categoriaDocumentacion->completado) {
            // Si la tarea está completada, redirige al índice.
            return redirect()->route('categoria_documentacions.index')->with('success', 'Categoria Documentacion Como Completado Satisfactoriamente!');
        } else {
            // Si la tarea no está completada, puedes elegir mantener al usuario en la misma página
            return back()->with('success', 'Categoria Documentacion Marcado Como no Completado.');
        }}
}
