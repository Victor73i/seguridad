@extends('layouts.master')
@section('title')
    @lang('Crear Tarea ')
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
            Crear Tarea
        @endslot
    @endcomponent

    <form method="POST" action="{{ route('tareas.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="id_glpi_users" class="form-label">TECNICO ASIGNADO</label>
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



                        <div class="mb-3">
                            <div>
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese el Nombre" required
                                       @class(['border-red-500' => $errors->has('nombre')])
                                       value="{{ old('nombre')}}"/>
                                @error('nombre')
                                <p class="error">{{$message}}</p>
                                @enderror
                        </div>

                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripcion</label>
                            <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Ingrese Descripcion" required
                                   @class(['border-red-500' => $errors->has('descripcion')])
                                   value="{{ old('descripcion')}}"/>
                            @error('descripcion')
                            <p class="error">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="fecha_asignacion" class="form-label">Fecha Asignacion</label>
                            <input type="date" name="fecha_asignacion" id="fecha_asignacion" class="form-control"
                                   @class(['border-red-500' => $errors->has('fecha_asignacion')])
                                   value="{{old('fecha_asignacion')}}"/>
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
                                           value="{{old('fecha_aproximada')}}"/>
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
                                           value="{{old('fecha_terminado')}}"/>
                                    @error('fecha_terminado')
                                    <p class="error">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3 mb-lg-0">
                                    <label for="estado" class="form-label">Estado</label>
                                    <select required name="estado" class="form-control" data-choices data-choices-search-false id="estado">
                                        <option value="">Estado</option>
                                        <option value="nuevo">nuevo</option>
                                        <option value="en proceso">en proceso</option>
                                        <option value="en espera">en espera</option>
                                        <option value="finalizado">Finalizado</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3 mb-lg-0">
                                    <label for="prioridad" class="form-label">Prioridad</label>
                                    <select required name="prioridad" class="form-control" data-choices data-choices-search-false id="prioridad">
                                        <option value="">Prioridad</option>
                                        <option value="baja">Baja</option>
                                        <option value="media">Media</option>
                                        <option value="Alta">Alta</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3 mb-lg-0">
                                    <label for="observacion" class="form-label">Observacion</label>
                                    <input type="text" name="observacion" id="observacion" class="form-control" placeholder="Ingrese Observacion" required
                                           @class(['border-red-500' => $errors->has('observacion')])
                                           value="{{ old('observacion')}}"/>
                                    @error('observacion')
                                    <p class="error">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3 mb-lg-0">
                                    <label for="id_glpi_tickets" class="form-label">Ticket</label>
                                    <select class="form-select" data-choices data-choices-search-false
                                            name="id_glpi_tickets" id="id_glpi_tickets"
                                            @class(['border-red-500' => $errors->has('id_glpi_tickets')])
                                            value="{{old('id_glpi_tickets')}}" >
                                        <option value="">Seleccione una ticket</option>
                                        @foreach ($id_glpi_tickets as $id_glpi_ticket)
                                            <option value="{{$id_glpi_ticket->id}}">{{ $id_glpi_ticket->id }}: {{$id_glpi_ticket->name}}</option>
                                        @endforeach

                                    </select>
                                    @error('id_glpi_tickets')
                                    <p class="error">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>



                        </div>
                        <hr>

                        <!-- end card body -->
                    </div>
                    <!-- end card -->


                </div>
                <!-- end card -->
                <div class="text-end mb-4">
                    <button type="submit" class="btn btn-danger w-sm">Delete</button>
                    <a  class="btn btn-secondary w-sm" href="{{route('tareas.index')}}">Cancelar</a>
                    <button type="submit" class="btn btn-success w-sm">Crear</button>
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
