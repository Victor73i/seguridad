@extends('layouts.app')



@section('title','Edit Reporte Insumo Inventariado')

@section('content')

    <form method="POST" action="{{route('reporte_insumo_inventariados.update', ['reporte_insumo_inventariado' => $reporte_insumo_inventariado->id])}}">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="nota">
                Nota
            </label>
            <input text="text" name="nota" id="nota"
                   @class(['border-red-500' => $errors->has('nota')])
                   value="{{$reporte_insumo_inventariado->nota}}"/>
            @error('nota')
            <p class="error">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="descripcion">Descripcion</label>
            <input text="text" name="descripcion" id="descripcion"
                   @class(['border-red-500' => $errors->has('descripcion')])
                   value="{{$reporte_insumo_inventariado->descripcion}}"/>
            @error('descripcion')
            <p class="error">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="id_glpi_passivedcequipments" >INSUMO</label>
            <select style="background-color: #e3f2fd;" class="form-control" required name="id_glpi_passivedcequipments" id="id_glpi_passivedcequipments"
                    @class(['border-red-500' => $errors->has('glpi_passivedcequipments')]) value="{{old('id_glpi_passivedcequipments')}}">
                <option value="">Seleccione un Glpi Insumo</option>
                @foreach ($glpi_passivedcequipments as $glpip)
                    <option value="{{ $glpip->id }}" {{ (old('id_glpi_passivedcequipments', $reporte_insumo_inventariado->id_glpi_passivedcequipments) == $glpip->id) ? 'selected' : '' }}>{{ $glpip->name }}</option>
                @endforeach
            </select>
            @error('id_glpi_passivedcequipments')
            <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="id_glpi_users" >Usuario</label>
            <select style="background-color: #e3f2fd;" class="form-control" required name="id_glpi_users" id="id_glpi_users"
                    @class(['border-red-500' => $errors->has('id_glpi_users')]) value="{{old('id_glpi_users')}}">
                <option value="">Seleccione un Glpi Users</option>
                @foreach ($glpi_users as $glpiu)
                    <option value="{{ $glpiu->id }}" {{ (old('id_glpi_users', $reporte_insumo_inventariado->id_glpi_users) == $glpiu->id) ? 'selected' : '' }}>{{ $glpiu->name }}</option>
                @endforeach
            </select>
            @error('id_glpi_users')
            <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="id_glpi_tickets" >Ticket</label>
            <select style="background-color: #e3f2fd;" class="form-control" required name="id_glpi_tickets" id="id_glpi_tickets"
                    @class(['border-red-500' => $errors->has('$glpi_tickets')]) value="{{old('id_glpi_tickets')}}">
                <option value="">Seleccione un Glpi Tickets</option>
                @foreach ($glpi_tickets as $glpit)
                    <option value="{{ $glpit->id }}" {{ (old('id_glpi_tickets', $reporte_insumo_inventariado->id_glpi_tickets) == $glpit->id) ? 'selected' : '' }}>{{$glpit->id}} * {{ $glpit->name }}</option>
                @endforeach
            </select>
            @error('id_glpi_tickets')
            <p class="error-message">{{ $message }}</p>
            @enderror
        </div><div class="mb-4">
            <label for="id_glpi_locations" >Ubicacion</label>
            <select style="background-color: #e3f2fd;" class="form-control" required name="id_glpi_locations" id="id_glpi_locations" @class(['border-red-500' => $errors->has('$glpi_locations')]) value="{{old('id_glpi_locations')}}">
                <option value="">Seleccione un Glpi Ubicacions</option>
                @foreach ($glpi_locations as $glpil)
                    <option value="{{ $glpil->id }}" {{ (old('id_glpi_locations', $reporte_insumo_inventariado->id_glpi_locations) == $glpil->id) ? 'selected' : '' }}>{{ $glpil->name }}</option>
                @endforeach
            </select>
            @error('id_glpi_locations')
            <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="archivo">Archivo</label>
            <input text="text" name="archivo" id="archivo"
                   @class(['border-red-500' => $errors->has('archivo')])
                   value="{{$reporte_insumo_inventariado->archivo}}"/>
            @error('no_pedido')
            <p class="error">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="fecha_asignacion">Fecha Asignacion</label>
            <input type="date" name="fecha_asignacion" id="fecha_asignacion"
                   @class(['border-red-500' => $errors->has('fecha_asignacion')])
                   value="{{$reporte_insumo_inventariado->fecha_asignacion}}"/>
            @error('fecha_asignacion')
            <p class="error">{{$message}}</p>
            @enderror
        </div>
        <div class="flex items-center gap-2">
            <button type="submit" class="btn">Editar Reporte</button>
            <a href="{{route('reporte_insumo_inventariados.index')}}" class="link">Cancel</a>
        </div>
    </form>

@endsection
