@extends('layouts.app')



    @section('title','Edit estado log')

@section('content')

    <form method="POST" action="{{route('estado_logs.update', ['estado_log' => $estado_log->id])}}">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="nombre">
                Nombre
            </label>
            <input text="text" name="nombre" id="nombre"
                   @class(['border-red-500' => $errors->has('nombre')])
                   value="{{$estado_log->nombre}}"/>
            @error('nombre')
            <p class="error">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="descripcion">Descripcion</label>
            <input text="text" name="descripcion" id="descripcion"
                   @class(['border-red-500' => $errors->has('descripcion')])
                   value="{{$estado_log->descripcion}}"/>
            @error('descripcion')
            <p class="error">{{$message}}</p>
            @enderror
        </div>

        <div class="flex items-center gap-2">
            <button type="submit" class="btn">Edit Estado Log</button>
            <a href="{{route('estado_logs.index')}}" class="link">Cancel</a>
        </div>
    </form>

@endsection
