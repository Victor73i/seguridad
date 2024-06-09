@extends('layouts.app')

@section('title', $reporte_insumo_fungible->nota)

@section('content')
    <div class="mb-4">
        <a href="{{route('reporte_insumo_fungibles.index')}}"
           class="link">Regresar a Lista de Reporte Insumo Fungible</a>
    </div>

    <p class="parrafo">{{$reporte_insumo_fungibles->reporte_insumo_fungible_id}}</p>

    <p class="parrafo">{{$reporte_insumo_fungibles->reporte_insumo_fungible_nota}}</p>
    <p class="parrafo">{{$reporte_insumo_fungibles->reporte_insumo_fungible_descripcion}}</p>
    <p class="parrafo">{{$reporte_insumo_fungibles->reporte_insumo_fungible_archivo}}</p>
    <p class="parrafo">{{$reporte_insumo_fungibles->glpi_user_name}}</p>
    <p class="parrafo">{{$reporte_insumo_fungibles->glpi_passivedcequipment_name}}</p>
    <p class="parrafo">{{$reporte_insumo_fungibles->glpi_ticket_id}} * {{$reporte_insumo_fungibles->glpi_ticket_name}}</p>
    <p class="parrafo">{{$reporte_insumo_fungibles->reporte_insumo_fungible_no_pedido}}</p>
    <p class="parrafo">{{$reporte_insumo_fungibles->reporte_insumo_fungible_fecha_asignacion}}</p>
    <p class="parrafo">{{$reporte_insumo_fungibles->glpi_location_name}}</p>
    <p class="parrafo">{{$reporte_insumo_fungibles->equipo_it_nombre}}</p>

    <p class="parrafo">Created {{$reporte_insumo_fungible->created_at->diffForHumans()}} * Updated {{$reporte_insumo_fungible->updated_at->diffForHumans()}}</p>


    <div class="flex gap-3">


        <a href="{{route('reporte_insumo_fungibles.edit', ['reporte_insumo_fungible' =>$reporte_insumo_fungible->id])}}"
           class="btn">EDIT</a>



        <form action="{{route('reporte_insumo_fungibles.destroy',['reporte_insumo_fungible' =>$reporte_insumo_fungible->id])}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn">DELETE</button>
        </form>
    </div>
@endsection
