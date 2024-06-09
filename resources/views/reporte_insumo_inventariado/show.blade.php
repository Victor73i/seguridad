@extends('layouts.app')

@section('title', $reporte_insumo_inventariado->nota)

@section('content')
    <div class="mb-4">
        <a href="{{route('reporte_insumo_inventariados.index')}}"
           class="link">Regresar a Lista de Reporte Insumo Inventariado</a>
    </div>

        <p class="parrafo">{{$reporte_insumo_inventariados->reporte_insumo_inventariado_id}}</p>

        <p class="parrafo">{{$reporte_insumo_inventariados->reporte_insumo_inventariado_nota}}</p>
        <p class="parrafo">{{$reporte_insumo_inventariados->reporte_insumo_inventariado_descripcion}}</p>

        <p class="parrafo">{{$reporte_insumo_inventariados->glpi_passivedcequipment_name}}</p>
        <p class="parrafo">{{$reporte_insumo_inventariados->glpi_user_name}}</p>
        <p class="parrafo">{{$reporte_insumo_inventariados->glpi_ticket_id}} * {{$reporte_insumo_inventariados->glpi_ticket_name}}</p>
        <p class="parrafo">{{$reporte_insumo_inventariados->glpi_location_name}}</p>
        <p class="parrafo">{{$reporte_insumo_inventariados->reporte_insumo_inventariado_archivo}}</p>
        <p class="parrafo">{{$reporte_insumo_inventariados->reporte_insumo_inventariado_fecha_asignacion}}</p>

        <p class="parrafo">Created {{$reporte_insumo_inventariado->created_at->diffForHumans()}} * Updated {{$reporte_insumo_inventariado->updated_at->diffForHumans()}}</p>
        <p class="mb-4">
            @if($reporte_insumo_inventariado->completado)
                <span class="completado">Completado</span>
            @else
                <span class="nocompletado">No Completado</span>
            @endif
        </p>

        <div class="flex gap-3">
            <form method="POST" action="{{route('reporte_insumo_inventariados.toggle-complete',['reporte_insumo_inventariado'=>$reporte_insumo_inventariado])}}">
                @csrf
                @method('PUT')
                <button type="submit" class="btn">
                    Mark as {{$reporte_insumo_inventariado->completado ? 'not completado' : 'completado'}}
                </button>
            </form>

            <a href="{{route('reporte_insumo_inventariados.edit', ['reporte_insumo_inventariado' =>$reporte_insumo_inventariado->id])}}"
               class="btn">EDIT</a>



            <form action="{{route('reporte_insumo_inventariados.destroy',['reporte_insumo_inventariado' =>$reporte_insumo_inventariado->id])}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn">DELETE</button>
            </form>
        </div>
        @endsection
