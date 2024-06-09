<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Area;
use App\Models\Categoria_insumo;
use App\Models\Documentacion;
use App\Models\Equipo_computo;
use App\Models\Estado_equipo_computo;
use App\Models\Estado_insumo;
use App\Models\Estado_log;
use App\Models\Estado_mantenimiento_equipo;
use App\Models\Insumo_mantenimiento_equipo;
use App\Models\Insumo;
use App\Models\Ip_equipo_computo;
use App\Models\Log;
use App\Models\Mantenimiento_equipo;
use App\Models\Rol_usuario;
use App\Models\Tipo_documentacion;
use App\Models\Tipo_equipo_computo;
use App\Models\Tipo_mantenimiento_equipo;
use App\Models\Ubicacion;
use App\Models\Usuario;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\TaskRequest;
use App\Http\Requests\AreaRequest;
use App\Http\Requests\Categoria_insumoRequest;
use App\Http\Requests\DocumentacionRequest;
use App\Http\Requests\Equipo_computoRequest;
use App\Http\Requests\Estado_equipo_computoRequest;
use App\Http\Requests\Estado_insumoRequest;
use App\Http\Requests\Estado_logRequest;
use App\Http\Requests\Estado_mantenimiento_equipoRequest;
use App\Http\Requests\InsumoRequest;
use App\Http\Requests\Insumo_mantenimiento_equipoRequest;
use App\Http\Requests\Ip_equipo_computoRequest;
use App\Http\Requests\LogRequest;
use App\Http\Requests\Mantenimiento_equipoRequest;
use App\Http\Requests\Rol_usuarioRequest;
use App\Http\Requests\Tipo_documentacionRequest;
use App\Http\Requests\Tipo_equipo_computoRequest;
use App\Http\Requests\Tipo_mantenimiento_equipoRequest;
use App\Http\Requests\UbicacionRequest;
use App\Http\Requests\UsuarioRequest;
class TaskController extends Controller
{
//INDEX
    public function index() {
        return view('task.index',[
            'tasks'=> \App\Models\Task::latest()->paginate(10)]);
        //'tasks'=> \App\Models\Task::latest()->get()]); para tener la ultima tarea mas reciente
        //'tasks'=> \App\Models\Task::latest()->where('completed', true)->get()]); para buscar los que estan completados

    }
    public function create()
    {
        return view('task.create');
    }
    //EDIT
    public function edit($id){
        return view('task.edit', [
            'task'=>\App\Models\Task::findOrFail($id)
        ]);
    }
    //SHOW
    public function show($id){
        return view('task.show', [
            'task'=>\App\Models\Task::findOrFail($id)
        ]);
    }
    //STORE
    public function store(TaskRequest $request){
//$data = $request->validated();

//     $task = new \App\Models\Task;
//     $task->title = $data['title'];
//     $task->description = $data['description'];
//     $task->long_description = $data['long_description'];
//     $task->save();
        $task = Task::create($request->validated());
        return redirect()-> route('tasks.show', ['task' => $task->id])
            ->with('success', 'Tarea Ingresada Correctamente!');
    }
//UPDATE
    public function update($id, TaskRequest $request){
        //$data = $request->validate();
        //$task = \App\Models\Task::findOrFail($id);
        //$task->title = $data['title'];
        //$task->description = $data['description'];
        //$task->long_description = $data['long_description'];
        //$task->save();
        $task = Task::findOrFail($id);
        $task -> update($request->validated());
        return redirect()-> route('tasks.show', ['task' => $task->id])
            ->with('success', 'Task UPDATE Successfully!');
    }
//DELETE
    public function destroy($id){
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()-> route('tasks.index')
            ->with('success', 'Task Deleted Successfully');
    }
    //TOOGLE-COMPLETE
    public function toggle(Task $task){
        $task->toggleComplete();
        if ($task->completed) {
            // Si la tarea está completada, redirige al índice.
            return redirect()->route('tasks.index')->with('success', 'Task marked as completed successfully!');
        } else {
            // Si la tarea no está completada, puedes elegir mantener al usuario en la misma página
            // o realizar otra acción, como redirigir a la página de edición de la tarea.
            // Por ejemplo, mantener al usuario en la misma página podría ser así:
            return back()->with('success', 'Task marked as not completed.');
        }

    }

}
