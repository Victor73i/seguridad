@extends('layouts.app')

@section('title', 'La Lista de Reporte Insumo Inventariado')


@section('content')
    {{-- @if(count($tasks)) --}}
    <nav class="mb-4">
        <a href="{{route('reporte_insumo_inventariados.create')}}"
           class="link">ADD Reporte Insumo Inventariado</a>
    </nav>
    @forelse ($reporte_insumo_inventariados as $reporte_insumo_inventariado)
        <div>
            <a href="{{route('reporte_insumo_inventariados.show', ['reporte_insumo_inventariado'=>$reporte_insumo_inventariado->id])}}"
                @class(['line-through' =>$reporte_insumo_inventariado->completado])>{{$reporte_insumo_inventariado->nota}}</a>

        </div>
    @empty

        <div>There are no Reporte Insumo Inventariados!</div>
    @endforelse

    @if ($reporte_insumo_inventariados->count())
        <nav class="mt-4">
            {{$reporte_insumo_inventariados->links()}}
        </nav>
    @endif
@endsection
{{-- @endif --}}

