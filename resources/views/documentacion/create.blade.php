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

    <form method="POST" action="{{ route('documentacions.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre"
                                   @class(['border-red-500' => $errors->has('nombre')])
                                   placeholder="Ingresa el Nombre" value="{{old('nombre')}}">
                            @error('nombre')
                            <p class="error">{{$message}}</p>
                            @enderror
                        </div>



                        <div class="mb-3">
                            <label class="form-label" for="descripcion">descripcion</label>
                            <textarea class="form-control" name="descripcion" id="ckeditor-classic" placeholder="Ingresa la descripcion"
                            @class(['border-red-500' => $errors->has('descripcion')])>
        {{ old('observaciones') }} </textarea>
                            @error('descripcion')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="fecha_creacion" class="form-label">Fecha Creacion</label>
                            <input type="date" name="fecha_creacion" id="fecha_creacion" class="form-control"
                                   @class(['border-red-500' => $errors->has('fecha_creacion')])
                                   value="{{old('fecha_creacion')}}"/>
                            @error('fecha_creacion')
                            <p class="error">{{$message}}</p>
                            @enderror
                        </div>


                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3 mb-lg-0">
                                    <label for="id_glpi_users" class="form-label">Usuario</label>
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
                            <div class="col-lg-4">
                                <div class="mb-3 mb-lg-0">
                                    <label for="id_estado_documentacion" class="form-label">Estado</label>
                                    <select class="form-select" data-choices data-choices-search-false
                                            name="id_estado_documentacion" id="id_estado_documentacion"
                                            @class(['border-red-500' => $errors->has('id_estado_documentacion')])
                                            value="{{old('id_estado_documentacion')}}" >
                                        <option value="">Seleccione un Estado</option>

                                        @foreach ($id_estado_documentacion as $id_estado_documentacions)
                                            <option value="{{$id_estado_documentacions->id}}">{{ $id_estado_documentacions->id }}: {{$id_estado_documentacions->nombre}}</option>
                                        @endforeach
                                    </select>
                                    @error('id_estado_documentacion')
                                    <p class="error">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3 mb-lg-0">
                                    <label for="id_tipo" class="form-label">TIPO</label>
                                    <select class="form-select" data-choices data-choices-search-false
                                            name="id_tipo_documentacion" id="id_tipo_documentacion"
                                            @class(['border-red-500' => $errors->has('id_tipo_documentacion')])
                                            value="{{old('id_tipo_documentacion')}}" >
                                        <option value="">Seleccione un Tipo</option>

                                        @foreach ($id_tipo_documentacion as $id_tipo_documentacions)
                                            <option value="{{$id_tipo_documentacions->id}}">{{ $id_tipo_documentacions->id }}: {{$id_tipo_documentacions->nombre}}</option>
                                        @endforeach
                                    </select>
                                    @error('id_tipo_documentacion')
                                    <p class="error">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3 mb-lg-0">
                                    <label for="id_categoria_documentacion" class="form-label">Categoria</label>
                                    <select class="form-select" data-choices data-choices-search-false
                                            name="id_categoria_documentacion" id="id_categoria_documentacion"
                                            @class(['border-red-500' => $errors->has('id_categoria_documentacion')])
                                            value="{{old('id_categoria_documentacion')}}" >
                                        <option value="">Seleccione una Categoria</option>

                                        @foreach ($id_categoria_documentacion as $id_categoria_documentacions)
                                            <option value="{{$id_categoria_documentacions->id}}">{{ $id_categoria_documentacions->id }}: {{$id_categoria_documentacions->nombre}}</option>
                                        @endforeach
                                    </select>
                                    @error('id_categoria_documentacion')
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
