@extends('layouts.app')

@section('title', $estado_documentacion->nombre)

@section('content')
    <div class="mb-4">
        <a href="{{route('estado_documentacions.index')}}"
           class="link">Regresar a Lista de Documentacion</a>
    </div>
    <p class="parrafo">{{$estado_documentacion->descripcion}}</p>
    <p class="parrafo">{{$estado_documentacion->completado}}</p>

    <p class="parrafo">Created {{$estado_documentacion->created_at->diffForHumans()}} * Updated {{$estado_documentacion->updated_at->diffForHumans()}}</p>
    <p></p>


    <div class="flex gap-3">


        <a href="{{route('estado_documentacions.edit', ['estado_documentacion' =>$estado_documentacion->id])}}"
           class="btn">EDIT</a>

        <form action="{{route('estado_documentacions.destroy',['estado_documentacion' =>$estado_documentacion->id])}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn">DELETE</button>
        </form>
    </div>
@endsection
