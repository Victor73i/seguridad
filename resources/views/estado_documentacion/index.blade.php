@extends('layouts.app')

@section('title', 'The list of estado_documentacions')


@section('content')
    {{-- @if(count($tasks)) --}}
    <nav class="mb-4">
        <a href="{{route('estado_documentacions.create')}}"
           class="link">ADD ESTADO Documentacion</a>
    </nav>
    @forelse ($estado_documentacions as $estado_documentacion)
        <div>
            <a href="{{route('estado_documentacions.show', ['estado_documentacion'=>$estado_documentacion->id])}}"
                @class(['line-through' =>$estado_documentacion->completado])>{{$estado_documentacion->nombre}}</a>

        </div>
    @empty

        <div>There are no estado_documentacions!</div>
    @endforelse

    @if ($estado_documentacions->count())
        <nav class="mt-4">
            {{$estado_documentacions->links()}}
        </nav>
    @endif
@endsection
{{-- @endif --}}

