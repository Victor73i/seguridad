@extends('layouts.app')

@section('title', 'The list of tipo documentacions')


@section('content')
   {{-- @if(count($tasks)) --}}
        <nav class="mb-4">
            <a href="{{route('tipo_documentacions.create')}}"
               class="link">ADD TIPO DOCUMENTACION</a>
        </nav>
   @forelse ($tipo_documentacions as $tipo_documentacion)

       <div>
        <a href="{{route('tipo_documentacions.show', ['tipo_documentacion'=>$tipo_documentacion->id])}}"
            @class(['line-through' =>$tipo_documentacion->completado])>{{$tipo_documentacion->nombre}}</a>

    </div>
    @empty

    <div>There are no tipo_documentacions!</div>
    @endforelse

   @if ($tipo_documentacions->count())
       <nav class="mt-4">
           {{$tipo_documentacions->links()}}
       </nav>
   @endif
@endsection
    {{-- @endif --}}

