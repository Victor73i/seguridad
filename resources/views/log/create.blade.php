@extends('layouts.master')
@section('title')
    @lang('Crear Log ')
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/dropzone/dropzone.css') }}" rel="stylesheet">
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Log
        @endslot
        @slot('title')
            Crear Log
        @endslot
    @endcomponent

    <form method="POST" action="{{ route('logs.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="titulo">Titulo</label>
                            <input type="text" class="form-control" id="titulo" name="titulo"
                                   @class(['border-red-500' => $errors->has('titulo')])
                                   placeholder="Ingresa el Titulo" value="{{old('titulo')}}">
                            @error('titulo')
                            <p class="error">{{$message}}</p>
                            @enderror
                        </div>



                        <div class="mb-3">
                            <label class="form-label" for="observaciones">Observaciones</label>
                            <textarea class="form-control" name="observaciones" id="ckeditor-classic" placeholder="Ingresa la Observacion"
                            @class(['border-red-500' => $errors->has('observaciones')])>
        {{ old('observaciones') }} </textarea>
                            @error('observaciones')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="fecha_inicio">Fecha Inicio</label>
                            <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control"
                                   @class(['border-red-500' => $errors->has('fecha_inicio')])
                                   value="{{old('fecha_inicio')}}"/>
                            @error('fecha_inicio')
                            <p class="error">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="fecha_finalizacion">Fecha Finalizacion</label>
                            <input type="date" name="fecha_finalizacion" id="fecha_finalizacion" class="form-control"
                                   @class(['border-red-500' => $errors->has('fecha_finalizacion')])
                                   value="{{old('fecha_finalizacion')}}"/>
                            @error('fecha_finalizacion')
                            <p class="error">{{$message}}</p>
                            @enderror
                        </div>


                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3 mb-lg-0">
                                    <label  class="form-label" for="id_estado_log">Estado</label>
                                    <select class="form-select" data-choices data-choices-search-false
                                            name="id_estado_log" id="id_estado_log">
                                        <option value="">Seleccione un Estado</option>

                                        @class(['border-red-500' => $errors->has('id_estado_log')])
                                        value="{{old('id_estado_log')}}" >
                                        @foreach ($id_estado_logs as $id_estado_log)
                                            <option value="{{$id_estado_log->id}}">{{ $id_estado_log->id }}: {{$id_estado_log->nombre}}</option>
                                        @endforeach
                                    </select>
                                    @error('id_estado_log')
                                    <p class="error">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3 mb-lg-0">
                                    <label class="form-label" for="id_glpi_locations">Ubicacion</label>
                                    <select class="form-select" data-choices data-choices-search-false
                                            name="id_glpi_locations" id="id_glpi_locations"
                                            @class(['border-red-500' => $errors->has('id_glpi_locations')])
                                            value="{{old('id_glpi_locations')}}" >
                                        <option value="">Seleccione una Ubicacion</option>

                                    @foreach ($id_glpi_locations as $id_glpi_location)
                                            <option value="{{$id_glpi_location->id}}">{{ $id_glpi_location->id }}: {{$id_glpi_location->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('id_glpi_locations')
                                    <p class="error">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3 mb-lg-0">
                                    <label class="form-label" for="id_glpi_tickets">Ticket</label>
                                    <select class="form-select" data-choices data-choices-search-false
                                            name="id_glpi_tickets" id="id_glpi_tickets"
                                            @class(['border-red-500' => $errors->has('id_glpi_tickets')])
                                            value="{{old('id_glpi_tickets')}}" >
                                        <option value="">Seleccione una Ticket</option>

                                    @foreach ($id_glpi_tickets as $id_glpi_ticket)
                                            <option value="{{$id_glpi_ticket->id}}">{{ $id_glpi_ticket->id }}: {{$id_glpi_ticket->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('id_glpi_tickets')
                                    <p class="error">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3 mb-lg-0">
                                    <label class="form-label" for="id_glpi_users">Users</label>
                                    <select class="form-select" data-choices data-choices-search-false
                                            name="id_glpi_users" id="id_glpi_users"
                                            @class(['border-red-500' => $errors->has('id_glpi_users')])
                                            value="{{old('id_glpi_users')}}" >
                                        <option value="">Seleccione un Usuario</option>

                                    @foreach ($id_glpi_users as $id_glpi_user)
                                            <option value="{{$id_glpi_user->id}}">{{ $id_glpi_user->id }}: {{$id_glpi_user->name}}</option>
                                        @endforeach
                                    </select>

                                    @error('id_glpi_users')
                                    <p class="error">{{$message}}</p>
                                    @enderror
                                </div>

                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3 mb-lg-0">
                                    <label class="form-label" for="id_equipo_computo[]">Equipo IT</label>
                                    <select class="form-select" data-choices
                                            name="id_equipo_computo[]" id="multiselect-basic"
                                            @class(['border-red-500' => $errors->has('id_equipo_computo')])
                                            required multiple="multiple">

                                        @foreach ($equipos_it as $equipo_it)
                                            <option value="{{$equipo_it->id}}">{{ $equipo_it->nombre }}</option>
                                        @endforeach
                                    </select>
                                    @error('id_equipo_computo')
                                    <p class="error">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>



                        </div>
                        <hr>

                        <!-- end card body -->
                    </div>
                    <!-- end card -->

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Archivo</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">

                                <!-- Multiple Files Input Example -->
                                <label for="archivo" class="form-label">Archivo</label>
                                <input class="form-control" type="file" name="archivo[]" id="archivo" multiple>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->
                    <div class="text-end mb-4">
                        <button type="submit" class="btn btn-danger w-sm">Delete</button>
                        <button type="submit" class="btn btn-secondary w-sm">Draft</button>
                        <button type="submit" class="btn btn-success w-sm">Create</button>
                    </div>
                </div>
                <!-- end col -->

            <!-- end row -->
            </div>
        </div>
    </form>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var element = document.getElementById('multiselect-basic');
            var choices = new Choices(element, {
                removeItemButton: true,
                searchEnabled: true,
                searchChoices: true,
                searchFloor: 1,
                searchResultLimit: 5,
                renderChoiceLimit: -1
            });
        });
    </script>
    <!-- Modal -->

    <!-- end modal -->
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>
    <script src="{{ URL::asset('build/libs/dropzone/dropzone-min.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/project-create.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>

@endsection
