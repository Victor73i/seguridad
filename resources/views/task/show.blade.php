@extends('layouts.app')

@section('title', $task->title)

@section('content')
    <div class="mb-4">
        <a href="{{route('tasks.index')}}"
           class="link">Regresar a Lista de Tareas</a>
    </div>

<p class="parrafo">{{$task->description}}</p>

@if($task->long_description)
    <p class="parrafo">{{$task->long_description}}</p>
@endif

<p class="parrafo"> Created {{$task->created_at->diffForHumans()}} * Updated {{$task->updated_at->diffForHumans()}}</p>
<p></p>

<p class="mb-4">
    @if($task->completed)
        <span class="completado">Completed</span
    @else
        <span class="nocompletado">Not Completed</span>
    @endif
</p>

<div class="flex gap-3">
    <a href="{{route('tasks.edit', ['task' =>$task->id])}}"
    class="btn">EDIT</a>

    <form method="POST" action="{{route('tasks.toggle-complete',['task'=>$task])}}" >
        @csrf
        @method('PUT')
        <button type="submit" class="btn" >
            Mark as {{$task->completed ? 'not completed' : 'completed'}}


        </button>
    </form>

        <form action="{{route('tasks.destroy',['task' =>$task])}}" method="POST">
        @csrf
        @method('DELETE')
            <button type="submit" class="btn">DELETE</button>
        </form>
    </div>

@endsection

