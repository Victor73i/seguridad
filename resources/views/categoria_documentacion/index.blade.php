@extends('layouts.app')

@section('title', 'The list of Categoria_Documentacions')


@section('content')
    {{-- @if(count($tasks)) --}}
    <nav class="mb-4">
        <a href="{{route('categoria_documentacions.create')}}"
           class="link">ADD Categoria Documentacion</a>
    </nav>
    @forelse ($categoria_documentacions as $categoria_documentacion)
        <div>
            <a href="{{route('categoria_documentacions.show', ['categoria_documentacion'=>$categoria_documentacion->id])}}"
                @class(['line-through' =>$categoria_documentacion->completado])>{{$categoria_documentacion->nombre}}</a>

        </div>
    @empty

        <div>There are no estado_logs!</div>
    @endforelse

    @if ($categoria_documentacions->count())
        <nav class="mt-4">
            {{$categoria_documentacions->links()}}
        </nav>
    @endif
@endsection
{{-- @endif --}}

