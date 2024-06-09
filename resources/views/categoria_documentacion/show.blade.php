@extends('layouts.app')

@section('title', $categoria_documentacion->nombre)

@section('content')
    <div class="mb-4">
        <a href="{{route('categoria_documentacions.index')}}"
           class="link">Regresar a Lista de Categoria Documentacion</a>
    </div>
    <p class="parrafo">{{$categoria_documentacion->descripcion}}</p>
    <p class="parrafo">{{$categoria_documentacion->completado}}</p>

    <p class="parrafo">Created {{$categoria_documentacion->created_at->diffForHumans()}} * Updated {{$categoria_documentacion->updated_at->diffForHumans()}}</p>
    <p></p>


    <div class="flex gap-3">

        <a href="{{route('categoria_documentacions.edit', ['categoria_documentacion' =>$categoria_documentacion->id])}}"
           class="btn">EDIT</a>

        <form action="{{route('categoria_documentacions.destroy',['categoria_documentacion' =>$categoria_documentacion->id])}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn">DELETE</button>
        </form>
    </div>
@endsection
