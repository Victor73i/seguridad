@extends('layouts.app')

@section('title', $reporte_insumo_consumible->nota)

@section('content')
    <div class="mb-4">
        <a href="{{route('reporte_insumo_consumibles.index')}}"
           class="link">Regresar a Lista de Reporte Insumo Consumible</a>
    </div>
        <p class="parrafo">{{$reporte_insumo_consumibles->reporte_insumo_consumible_id}}</p>

        <p class="parrafo">{{$reporte_insumo_consumibles->reporte_insumo_consumible_nota}}</p>
        <p class="parrafo">{{$reporte_insumo_consumibles->reporte_insumo_consumible_descripcion}}</p>
        <p class="parrafo">{{$reporte_insumo_consumibles->reporte_insumo_consumible_fecha_asignacion}}</p>
        <p class="parrafo">{{$reporte_insumo_consumibles->reporte_insumo_consumible_no_pedido}}</p>
        <p class="parrafo">{{$reporte_insumo_consumibles->glpi_passivedcequipment_name}}</p>
        <p class="parrafo">{{$reporte_insumo_consumibles->glpi_user_name}}</p>
        <p class="parrafo">{{$reporte_insumo_consumibles->glpi_location_name}}</p>

        <p class="parrafo">Created {{$reporte_insumo_consumible->created_at->diffForHumans()}} * Updated {{$reporte_insumo_consumible->updated_at->diffForHumans()}}</p>
        <p class="mb-4">
            @if($reporte_insumo_consumible->completado)
                <span class="completado">Completado</span>
            @else
                <span class="nocompletado">No Completado</span>
            @endif
        </p>

        <div class="flex gap-3">
            <form method="POST" action="{{route('reporte_insumo_consumibles.toggle-complete',['reporte_insumo_consumible'=>$reporte_insumo_consumible])}}">
                @csrf
                @method('PUT')
                <button type="submit" class="btn">
                    Mark as {{$reporte_insumo_consumible->completado ? 'not completado' : 'completado'}}
                </button>
            </form>

            <a href="{{route('reporte_insumo_consumibles.edit', ['reporte_insumo_consumible' =>$reporte_insumo_consumible->id])}}"
               class="btn">EDIT</a>

            {{--
                <div class="table-container">
                <div><h1>LIST STUDENT</h1>
                    <br><br>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
                    <table class="table">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">NOMBRE</th>
                            <th scope="col">EDAD</th>
                            <th scope="col">GENERO</th>
                            <th scope="col">TELEFONO</th>
                            <th scope="col">ENCARGADO</th>
                            <th scope="col">DIRECCION</th>

                            <th scope="col">GRADE</th>




                        </tr>
                        </thead>
                        <tbody>
                        @foreach($ubicacions as $ubicacion1)
                            <tr>

                                <td>{{$ubicacion1->ubicacion_id}}</td>
                                <td>{{$ubicacion1->ubicacion_nombre}}</td>
                                <td>{{$ubicacion1->area_nombre}}</td>
                                <td>{{$ubicacion1->area_descripcion}}</td>
                                <td>{{$ubicacion1->ubicacion_descripcion}}</td>




                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div> --}}


            <form action="{{route('reporte_insumo_consumibles.destroy',['reporte_insumo_consumible' =>$reporte_insumo_consumible->id])}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn">DELETE</button>
            </form>
        </div>
        @endsection
