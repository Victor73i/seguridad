@extends('layouts.app')



@section('title','Edit Categoria documentacion')

@section('content')

    <form method="POST" action="{{route('categoria_documentacions.update', ['categoria_documentacion' => $categoria_documentacion->id])}}">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="nombre">
                Nombre
            </label>
            <input text="text" name="nombre" id="nombre"
                   @class(['border-red-500' => $errors->has('nombre')])
                   value="{{$categoria_documentacion->nombre}}"/>
            @error('nombre')
            <p class="error">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="descripcion">Descripcion</label>
            <input text="text" name="descripcion" id="descripcion"
                   @class(['border-red-500' => $errors->has('descripcion')])
                   value="{{$categoria_documentacion->descripcion}}"/>
            @error('descripcion')
            <p class="error">{{$message}}</p>
            @enderror
        </div>

        <div class="flex items-center gap-2">
            <button type="submit" class="btn">Edit Categoria Documentacion</button>
            <a href="{{route('categoria_documentacions.index')}}" class="link">Cancel</a>
        </div>
    </form>

@endsection
