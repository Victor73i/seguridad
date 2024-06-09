@extends('layouts.app')



@section('title','Agregar Reporte Insumo Fungible')

@section('content')

    <form method="POST" action="{{route('reporte_insumo_fungibles.store')}}">
        @csrf
        <div class="mb-4">
            <label for="nota">
                Nota
            </label>
            <input text="text" name="nota" id="nota"
                   @class(['border-red-500' => $errors->has('nota')])
                   value="{{ old('nota')}}"/>
            @error('nota')
            <p class="error">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="descripcion">Descripcion</label>
            <input text="text" name="descripcion" id="descripcion"
                   @class(['border-red-500' => $errors->has('descripcion')])
                   value="{{ old('descripcion')}}"/>
            @error('descripcion')
            <p class="error">{{$message}}</p>
            @enderror
        </div><div class="mb-4">
            <label for="archivo">Archivo</label>
            <input text="text" name="archivo" id="archivo"
                   @class(['border-red-500' => $errors->has('archivo')])
                   value="{{ old('archivo')}}"/>
            @error('archivo')
            <p class="error">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="id_glpi_users" >GLPI USUARIO</label>
            <select style="background-color: #e3f2fd;" class="form-control" required name="id_glpi_users" id="id_glpi_users" @class(['border-red-500' => $errors->has('name')]) value="{{old('id_glpi_users')}}">
                <option value="">Seleccione un GLPI USUARIO</option>
                @foreach ($glpi_users as $glpiu)
                    <option value="{{ $glpiu->id }}">{{ $glpiu->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="id_glpi_passivedcequipments" >GLPI INSUMO</label>
            <select style="background-color: #e3f2fd;" class="form-control" required name="id_glpi_passivedcequipments" id="id_glpi_passivedcequipments"
                    @class(['border-red-500' => $errors->has('id_glpi_passivedcequipments')]) value="{{old('id_glpi_passivedcequipments')}}">
                <option value="">Seleccione un GLPI Insumo</option>
                @foreach ($glpi_passivedcequipments as $glpip)
                    <option value="{{ $glpip->id }}">{{ $glpip->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="id_glpi_tickets" >GLPI TICKET</label>
            <select style="background-color: #e3f2fd;" class="form-control" required name="id_glpi_tickets" id="id_glpi_tickets"
                    @class(['border-red-500' =>$errors->has('id_glpi_tickets')]) value="{{old('id_glpi_tickets')}}">
                <option value="">Seleccione una Ticket</option>
                @foreach ($glpi_tickets as $glpit)
                    <option value="{{ $glpit->id }}">{{$glpit->id}} * {{ $glpit->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="no_pedido">No. Pedido</label>
            <input text="text" name="no_pedido" id="no_pedido"
                   @class(['border-red-500' => $errors->has('no_pedido')])
                   value="{{ old('no_pedido') }}"/>
            @error('no_pedido')
            <p class="error">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="fecha_asignacion">Fecha Asignacion</label>
            <input type="date" name="fecha_asignacion" id="fecha_asignacion"
                   @class(['border-red-500' => $errors->has('fecha_asignacion')])
                   value="{{ old('fecha_asignacion') }}"/>
            @error('fecha_asignacion')
            <p class="error">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="id_glpi_locations" >GLPI Locations</label>
            <select style="background-color: #e3f2fd;" class="form-control" required name="id_glpi_locations" id="id_glpi_locations"
                    @class(['border-red-500' => $errors->has('id_glpi_locations')]) value="{{old('id_glpi_locations')}}">
                <option value="">Seleccione un GLPI Location</option>
                @foreach ($glpi_locations as $glpil)
                    <option value="{{ $glpil->id }}">{{ $glpil->name }}</option>
                @endforeach
            </select>
        </div><div class="mb-4">
            <label for="id_equipo_it" >Equipo IT</label>
            <select style="background-color: #e3f2fd;" class="form-control" required name="id_equipo_it" id="id_equipo_it"
                    @class(['border-red-500' => $errors->has('id_equipo_it')]) value="{{old('id_equipo_it')}}">
                <option value="">Seleccione un Equipo It</option>
                @foreach ($equipo_its as $equipo_it)
                    <option value="{{ $equipo_it->id }}">{{ $equipo_it->nombre }}</option>
                @endforeach
            </select>
        </div>


        <div class="flex items-center gap-2">
            <button type="submit" class="btn">Add REPORTE</button>
            <a href="{{route('reporte_insumo_fungibles.index')}}" class="link">Cancel</a>
        </div>
    </form>


@endsection
