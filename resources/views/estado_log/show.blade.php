@extends('layouts.app')

@section('title', $estado_log->nombre)

@section('content')
    <div class="mb-4">
        <a href="{{route('estado_logs.index')}}"
           class="link">Regresar a Lista de Estado Log</a>
    </div>
<p class="parrafo">{{$estado_log->descripcion}}</p>
<p class="parrafo">{{$estado_log->completado}}</p>

<p class="parrafo">Created {{$estado_log->created_at->diffForHumans()}} * Updated {{$estado_log->updated_at->diffForHumans()}}</p>
<p></p>


<div class="flex gap-3">


    <a href="{{route('estado_logs.edit', ['estado_log' =>$estado_log->id])}}"
    class="btn">EDIT</a>

    <form action="{{route('estado_logs.destroy',['estado_log' =>$estado_log->id])}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn">DELETE</button>
    </form>
</div>
@endsection
