@extends('layouts.app')



@section('title','Add estado log')

@section('content')

    <form method="POST" action="{{route('estado_logs.store')}}">
        @csrf
        <div class="mb-4">
            <label for="nombre">
                Nombre
            </label>
            <input text="text" name="nombre" id="nombre"
                   @class(['border-red-500' => $errors->has('nombre')])
                   value="{{ old('nombre')}}"/>
            @error('nombre')
            <p class="error">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="descripcion">Descripcion</label>
            <input text="text" name="descripcion" id="descripcion"
                   @class(['border-red-500' => $errors->has('descripcion')])
                   value="{{ old('descripcion')}}"/>
            @error('descripcion')
            <p class="error">{{$message}}</p>
            @enderror
        </div>

        <div class="flex items-center gap-2">
            <button type="submit" class="btn">Add Estado Log</button>
            <a href="{{route('estado_logs.index')}}" class="link">Cancel</a>
        </div>
    </form>

@endsection
