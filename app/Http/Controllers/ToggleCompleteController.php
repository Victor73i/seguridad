<?php

namespace App\Http\Controllers;

use App\Models\Documentacion;
use App\Models\EstadoLog;
use App\Models\Log;
use App\Models\TipoDocumentacion;
use App\Models\Ubicacion;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ToggleCompleteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private function toggleComplete($model)
    {
        $modelName = class_basename($model);
        $modelNameSnake = Str::snake($modelName);
        $routeName = $modelNameSnake . 's' . '.index';
        $model->toggleComplete();
        if ($model->completado) {
            // Si la tarea está completada, redirige al índice.
            return redirect()->route($routeName)->with('success', 'Area marked as completed successfully!');
        } else {
            // Si la tarea no está completada, puedes elegir mantener al usuario en la misma página
            return back()->with('success', 'Area marked as not completed.');
        }
    }

    public function area(Area $area) {
        return $this->toggleComplete($area);
    }

    public function documentacion (Documentacion $documentacion) {
        return $this->toggleComplete($documentacion);
    }

    public function insumo (Insumo $insumo) {
        return $this->toggleComplete($insumo);
    }

    public function insumoMantenimientoEquipo (InsumoMantenimientoEquipo $insumoMantenimientoEquipo) {
        return $this->toggleComplete($insumoMantenimientoEquipo);
    }

    public function ipEquipoComputo (IpEquipoComputo $ipEquipoComputo) {
        return $this->toggleComplete($ipEquipoComputo);
    }

    public function log (Log $log) {
        return $this->togglogplete($log);
    }

    public function ubicacion (Ubicacion $ubicacion) {
        return $this->toggleComplete($ubicacion);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ToggleCompleteRequest $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
