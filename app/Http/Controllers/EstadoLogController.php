<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EstadoLogRequest;
use App\Models\EstadoLog;

class EstadoLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('estado_log.index',[
            'estado_logs'=> EstadoLog::latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('estado_log.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EstadoLogRequest $request)
    {
        //    $data = $request->validate();
        //
        //    $estado_log = new \App\Models\Estado_log;
        //    $estado_log->nombre = $data['nombre'];
        //    $estado_log->descripcion = $data['descripcion'];
        //    $estado_log->save();
        $estado_log = EstadoLog::create($request->validated());
        return redirect()-> route('estado_logs.show', [$estado_log->id])
            ->with('success', 'Estado create Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('estado_log.show', [
            'estado_log'=> EstadoLog::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('estado_log.edit', [
            'estado_log'=> EstadoLog::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EstadoLogRequest $request, string $id)
    {
        //$data = $request->validate();
        //$estado_log = \App\Models\Estado_log::findOrFail($id);
        //$estado_log->nombre = $data['nombre'];
        //$estado_log->descripcion = $data['descripcion'];
        //$estado_log->save();
        $estado_log = EstadoLog::findOrFail($id);
        $estado_log->update($request->validated());
        return redirect()-> route('estado_logs.show', [$estado_log->id])
            ->with('success', 'Estado update Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $estado_log = EstadoLog::findOrFail($id);
        $estado_log->delete();
        return redirect()-> route('estado_logs.index')
            ->with('success', 'Estado Log Deleted Successfully');
    }
    //toggle-complete
    public function toggle(EstadoLog $estado_log){
        $estado_log->toggleComplete();
        if ($estado_log->completado) {
            // Si la tarea está completada, redirige al índice.
            return redirect()->route('estado_logs.index')->with('success', 'Estado Log marked as completed successfully!');
        } else {
            // Si la tarea no está completada, puedes elegir mantener al usuario en la misma página
            return back()->with('success', 'Estado Log marked as not completed.');
        }}
}
