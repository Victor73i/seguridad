@extends('layouts.app')

@section('title', $tipo_documentacion->nombre)

@section('content')
    <div class="mb-4">
        <a href="{{route('tipo_documentacions.index')}}"
           class="link">Regresar a Lista de Tareas</a>
    </div>
<p class="parrafo">{{$tipo_documentacion->descripcion}}</p>
<p class="parrafo">{{$tipo_documentacion->completado}}</p>
<p class="parrafo">Created {{$tipo_documentacion->created_at->diffForHumans()}} * Updated {{$tipo_documentacion->updated_at->diffForHumans()}}</p>
<p></p>
<p class="mb-4">
    @if($tipo_documentacion->completado)
    <span class="completado">Completado</span>
    @else
    <span class="nocompletado">No Completado</span>
    @endif
</p>

<div class="flex gap-3">
    <form method="POST" action="{{route('tipo_documentacions.toggle-complete',['tipo_documentacion'=>$tipo_documentacion])}}">
        @csrf
        @method('PUT')
        <button type="submit" class="btn">
            Mark as {{$tipo_documentacion->completado ? 'not completado' : 'completado'}}
        </button>
    </form>

    <a href="{{route('tipo_documentacions.edit', ['tipo_documentacion' =>$tipo_documentacion->id])}}"
    class="btn">EDIT</a>

    <form action="{{route('tipo_documentacions.destroy',['tipo_documentacion' =>$tipo_documentacion->id])}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn">DELETE</button>
    </form>
</div>
@endsection
