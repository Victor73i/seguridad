@extends('layouts.app')

@section('title', 'La Lista de Reporte Insumo Fungible')


@section('content')
    {{-- @if(count($tasks)) --}}
    <nav class="mb-4">
        <a href="{{route('reporte_insumo_fungibles.create')}}"
           class="link">ADD Reporte Insumo fungible</a>
    </nav>
    @forelse ($reporte_insumo_fungibles as $reporte_insumo_fungible)
        <div>
            <a href="{{route('reporte_insumo_fungibles.show', ['reporte_insumo_fungible'=>$reporte_insumo_fungible->id])}}"
                @class(['line-through' =>$reporte_insumo_fungible->completado])>{{$reporte_insumo_fungible->nota}}</a>

        </div>
    @empty

        <div>There are no Reporte Insumo Inventariados!</div>
    @endforelse

    @if ($reporte_insumo_fungibles->count())
        <nav class="mt-4">
            {{$reporte_insumo_fungibles->links()}}
        </nav>
    @endif
@endsection
{{-- @endif --}}

