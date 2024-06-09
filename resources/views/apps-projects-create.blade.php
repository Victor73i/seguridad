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

    <form method="POST" action="{{ route('logs.store', [$log->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="titulo">Titulo</label>
                            <input type="text" class="form-control" id="titulo" name="titulo"
                                   @class(['border-red-500' => $errors->has('titulo')]) value="{{$log->titulo}}"
                                   placeholder="Ingresa el Titulo" >
                            @error('titulo')
                            <p class="error">{{$message}}</p>
                            @enderror
                        </div>



                        <div class="mb-3">
                            <label class="form-label" for="observaciones">Observaciones</label>
                            <textarea class="form-control" name="observaciones" id="ckeditor-classic" placeholder="Ingresa la Observacion"
                            @class(['border-red-500' => $errors->has('observaciones')]) value="{{$log->observaciones}}">
        {{$log->observaciones}} </textarea>
                            @error('observaciones')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="fecha_inicio">Fecha Inicio</label>
                            <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control"
                                   @class(['border-red-500' => $errors->has('fecha_inicio')])
                                   value="{{$log->fecha_inicio}}"/>
                            @error('fecha_inicio')
                            <p class="error">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="fecha_finalizacion">Fecha Finalizacion</label>
                            <input type="date" name="fecha_finalizacion" id="fecha_finalizacion" class="form-control"
                                   @class(['border-red-500' => $errors->has('fecha_finalizacion')])
                                   value="{{$log->fecha_finalizacion}}"/>
                            @error('fecha_finalizacion')
                            <p class="error">{{$message}}</p>
                            @enderror
                        </div>


                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3 mb-lg-0">
                                    <label  class="form-label" for="id_estado_log">Estado</label>
                                    <select class="form-select" data-choices data-choices-search-true
                                            name="id_estado_log" id="id_estado_log">

                                        @class(['border-red-500' => $errors->has('id_estado_log')])
                                        value="{{$log->id_estado_log}}" >
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
                                            value="{{$log->id_glpi_locations}}" >

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
                                            value="{{$log->id_glpi_tickets}}" >

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
                                            value="{{$log->id_glpi_users}}" >

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
                                            required multiple="multiple" value="{{$log->id_equipo_computo}}">

                                        @foreach ($equipos_it as $equipo_it)
                                            @if($log->equiposIt->contains('id', $equipo_it->id))
                                                <option value="{{$equipo_it->id}}" selected="">{{ $equipo_it->id }}: {{$equipo_it->nombre}}</option>
                                            @else
                                                <option value="{{$equipo_it->id}}">{{ $equipo_it->id }}: {{$equipo_it->nombre}}</option>
                                            @endif
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
                            <p class="text-muted">Agregar Histórico.</p>
                            <div class="dropzone">
                                <div class="fallback">
                                    <input name="archivo" type="file" class="form-control" multiple="multiple" value="{{$log->archivo}}">


                                </div>
                                <div class="dz-message needsclick">
                                    <div class="mb-3">
                                        <i class="display-4 text-muted ri-upload-cloud-2-fill"></i>
                                    </div>

                                    <h5>Click Para subir Historico.</h5>
                                </div>
                            </div>

                            <ul class="list-unstyled mb-0" id="dropzone-preview">
                                <li class="mt-2" id="dropzone-preview-list">
                                    <!-- This is used as the file preview template -->
                                    <div class="border rounded">
                                        <div class="d-flex p-2">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar-sm bg-light rounded">
                                                    <img src="#" alt="Project-Image" data-dz-thumbnail
                                                         class="img-fluid rounded d-block" />
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <div class="pt-1">
                                                    <h5 class="fs-14 mb-1" data-dz-name>&nbsp;</h5>
                                                    <p class="fs-13 text-muted mb-0" data-dz-size></p>
                                                    <strong class="error text-danger" data-dz-errormessage></strong>
                                                </div>
                                            </div>
                                            <div class="flex-shrink-0 ms-3">
                                                <button data-dz-remove class="btn btn-sm btn-danger">Borrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <!-- end dropzon-preview -->
                        </div>
                    </div>
                </div>
                <!-- end card -->
                <div class="text-end mb-4">
                    <button href="#" class="btn btn-danger w-sm">Delete</button>
                    <a href="{{route('logs.index')}}" class="btn btn-secondary w-sm">Cancel</a>
                    <button type="submit" class="btn btn-success w-sm">Editar</button>
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
