@extends('layouts.master')
@section('title')
    @lang('Editar Tarea ')
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/dropzone/dropzone.css') }}" rel="stylesheet">
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Tarea
        @endslot
        @slot('title')
            EDITAR Tarea
        @endslot
    @endcomponent

    <form method="POST" action="{{ route('tareas.update', [$tarea->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="col-lg-4">
                                <div class="mb-3 mb-lg-0">
                                    <label for="id_glpi_users" class="form-label">TECNICO ASIGNADO</label>
                                    <select class="form-select" data-choices data-choices-search-false
                                            name="id_glpi_users" id="id_glpi_users"
                                        @class(['border-red-500' => $errors->has('id_glpi_users')])>

                                        @foreach ($id_glpi_users as $id_glpi_user)
                                            <option value="{{ $id_glpi_user->id }}" {{ $tarea->id_glpi_users == $id_glpi_user->id ? 'selected' : '' }}>
                                                {{ $id_glpi_user->id }}: {{ $id_glpi_user->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('id_glpi_users')
                                    <p class="error">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>
                        </div>



                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese el Nombre" required
                                   @class(['border-red-500' => $errors->has('nombre')])
                                   value="{{$tarea->nombre}}"/>
                            @error('nombre')
                            <p class="error">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripcion</label>
                            <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Ingrese Descripcion" required
                                   @class(['border-red-500' => $errors->has('descripcion')])
                                   value="{{ $tarea->descripcion}}"/>
                            @error('descripcion')
                            <p class="error">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="fecha_asignacion" class="form-label">Fecha Asignacion</label>
                            <input type="date" name="fecha_asignacion" id="fecha_asignacion" class="form-control"
                                   @class(['border-red-500' => $errors->has('fecha_asignacion')])
                                   value="{{$tarea->fecha_asignacion}}"/>
                            @error('fecha_asignacion')
                            <p class="error">{{$message}}</p>
                            @enderror
                        </div>


                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3 mb-lg-0">
                                    <label for="fecha_aproximada" class="form-label">Fecha Aproximada</label>
                                    <input type="date" name="fecha_aproximada" id="fecha_aproximada" class="form-control"
                                           @class(['border-red-500' => $errors->has('fecha_aproximada')])
                                           value="{{$tarea->fecha_aproximada}}"/>
                                    @error('fecha_aproximada')
                                    <p class="error">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3 mb-lg-0">
                                    <label for="fecha_terminado" class="form-label">Fecha Terminado</label>
                                    <input type="date" name="fecha_terminado" id="fecha_terminado" class="form-control"
                                           @class(['border-red-500' => $errors->has('fecha_terminado')])
                                           value="{{$tarea->fecha_terminado}}"/>
                                    @error('fecha_terminado')
                                    <p class="error">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3 mb-lg-0">
                                    <label for="estado" class="form-label">Estado</label>
                                    <select required name="estado" class="form-control" data-choices data-choices-search-false id="estado">
                                        <option value="nuevo" {{ $tarea->estado == 'nuevo' ? 'selected' : '' }}>nuevo</option>
                                        <option value="en espera" {{ $tarea->estado == 'en espera' ? 'selected' : '' }}>en espera</option>
                                        <option value="en proceso" {{ $tarea->estado == 'en proceso' ? 'selected' : '' }}>en proceso</option>
                                        <option value="terminado" {{ $tarea->estado == 'terminado' ? 'selected' : '' }}>terminado</option>
                                        <option value="borrado" {{ $tarea->estado == 'borrado' ? 'selected' : '' }}>borrado</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3 mb-lg-0">
                                    <label for="prioridad" class="form-label">Prioridad</label>
                                    <select required name="prioridad" class="form-control" data-choices data-choices-search-false id="prioridad">
                                        <option value="">Seleccione la prioridad</option>
                                        <option value="baja" {{ $tarea->prioridad == 'baja' ? 'selected' : '' }}>Baja</option>
                                        <option value="media" {{ $tarea->prioridad == 'media' ? 'selected' : '' }}>Media</option>
                                        <option value="alta" {{ $tarea->prioridad == 'alta' ? 'selected' : '' }}>Alta</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label for="observacion" class="form-label">Observacion</label>
                                <input type="text" name="observacion" id="observacion" class="form-control" placeholder="Ingrese Observacion" required
                                       @class(['border-red-500' => $errors->has('observacion')])
                                       value="{{ $tarea->observacion}}"/>
                                @error('observacion')
                                <p class="error">{{$message}}</p>
                                @enderror
                            </div>
                            <!--end col-->
                            <div class="col-lg-12">

                                <label for="id_glpi_tickets" class="form-label">Ticket</label>
                                <select class="form-select" data-choices data-choices-search-false
                                        name="id_glpi_tickets" id="id_glpi_tickets"
                                    @class(['border-red-500' => $errors->has('id_glpi_tickets')])>

                                    @foreach ($id_glpi_tickets as $id_glpi_ticket)
                                        <option value="{{ $id_glpi_ticket->id }}" {{ $tarea->id_glpi_tickets == $id_glpi_ticket->id ? 'selected' : '' }}>
                                            {{ $id_glpi_ticket->id }}: {{ $id_glpi_ticket->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_glpi_tickets')
                                <p class="error">{{ $message }}</p>
                                @enderror
                            </div>



                        </div>
                        <hr>

                        <!-- end card body -->
                    </div>
                    <!-- end card -->


                </div>
                <!-- end card -->
                <div class="text-end mb-4">
                    <button href="#" class="btn btn-danger w-sm">Delete</button>
                    <a href="{{route('tareas.index')}}" class="btn btn-secondary w-sm">Cancel</a>
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
