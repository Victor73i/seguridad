@extends('layouts.app')

@section('title', 'La Lista de Reporte Insumo Consumibles')


@section('content')
    {{-- @if(count($tasks)) --}}
    <nav class="mb-4">
        <a href="{{route('reporte_insumo_consumibles.create')}}"
           class="link">ADD Reporte Insumo Consumible</a>
    </nav>
    @forelse ($reporte_insumo_consumibles as $reporte_insumo_consumible)
        <div>
            <a href="{{route('reporte_insumo_consumibles.show', ['reporte_insumo_consumible'=>$reporte_insumo_consumible->id])}}"
                @class(['line-through' =>$reporte_insumo_consumible->completado])>{{$reporte_insumo_consumible->nota}}</a>

        </div>
    @empty

        <div>There are no Reporte Insumo Consumibles!</div>
    @endforelse

    @if ($reporte_insumo_consumibles->count())
        <nav class="mt-4">
            {{$reporte_insumo_consumibles->links()}}
        </nav>
    @endif
@endsection
{{-- @endif --}}

