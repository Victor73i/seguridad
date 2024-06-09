@extends('layouts.master')
@section('title')
    @lang('Documentacion')
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/dragula/dragula.min.css') }}" rel="stylesheet" type="text/css" />

@endsection
@section('content')

    <div class="chat-wrapper d-lg-flex gap-1 mx-n4 mt-n4 p-1">

        <div class="file-manager-sidebar">

            <div class="p-4 d-flex flex-column h-100">
                <div class="mb-3">
                    <button class="btn btn-success w-100" data-bs-target="#createEstadoModal" data-bs-toggle="modal"><i class="ri-add-line align-bottom"></i> Agregar Estado</button>
                </div>
                <div class="mb-3">
                    <button class="btn btn-success w-100" data-bs-target="#createTipoModal" data-bs-toggle="modal"><i class="ri-add-line align-bottom"></i> Agregar Tipo</button>
                </div>
                <div class="mb-3">
                    <button class="btn btn-success w-100" data-bs-target="#createCategoriaModal" data-bs-toggle="modal"><i class="ri-add-line align-bottom"></i> Agregar Categoria</button>
                </div>




                <div class="mt-auto text-center">
                    <img src="{{URL::asset('build/images/empornac.png')}}" alt="Task" class="img-fluid" />
                </div>
            </div>
        </div>
        <!--end side content-->
        <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Documentacion</h5>
                        <hr>
                        <div class="d-flex flex-wrap gap-2">
                            <button class="btn btn-danger add-btn" data-bs-toggle="modal" data-bs-target="#createTask"><i class="ri-add-line align-bottom me-1"></i> Crear Tarea</button>
                            <a href="index" class="btn btn-info add-btn"><i class="ri-add-line align-bottom me-1"></i> Inicio</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">

                        <table id="buttons-datatables" class="display table table-bordered" style="width:100%">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Fecha Creacion</th>
                                <th>Archivo</th>
                                <th>Estado </th>
                                <th>Tipo</th>
                                <th>Categoria</th>
                                <th>Usuario</th>
                                <th>Accion</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($documentacions as $documentacion)

                                <tr>
                                    <td>{{$documentacion->id}}</td>
                                    <td>{{$documentacion->nombre}}</td>
                                    <td>{{$documentacion->descripcion}}</td>
                                    <td>{{$documentacion->fecha_creacion}}</td>
                                    <td>

                                        @if($documentacion->archivo)
                                            @php
                                                $archivos = explode(',', $documentacion->archivo);
                                            @endphp

                                            @foreach($archivos as $archivo)
                                                @if(pathinfo($archivo, PATHINFO_EXTENSION) === 'pdf')
                                                    <a href="{{ asset('documentacion/archivo/' . $archivo) }}" target="_blank">Ver PDF</a>
                                                @elseif(in_array(pathinfo($archivo, PATHINFO_EXTENSION), ['png', 'jpg', 'jpeg', 'gif']))
                                                    <!-- Utilizamos data-bs-toggle y data-bs-target para activar el modal -->
                                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#imagenZoomModal" onclick="showImage('{{ asset('documentacion/archivo/' . $archivo) }}')">
                                                        <img src="{{ asset('documentacion/archivo/' . $archivo) }}" alt="archivo" width="50px" height="50px">
                                                    </a>
                                                @else
                                                    <a href="{{ asset('documentacion/archivo/' . $archivo) }}" download>Descargar</a>
                                                @endif
                                                <br>
                                            @endforeach
                                        @endif

                                    </td>
                                    <td>{{$documentacion->estado_documentacion->nombre}}</td>
                                    <td>{{$documentacion->tipo_documentacion->nombre}}</td>
                                    <td>{{$documentacion->categoria_documentacion->nombre}}</td>
                                    <td>{{$documentacion->glpi_users->name}}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton{{ $documentacion->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                                Acciones
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $documentacion->id }}">
                                                <li><a class="dropdown-item" href="{{route('documentacions.show', ['documentacion'=>$documentacion->id])}}"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> Ver</a></li>
                                                <li><a class="dropdown-item" href="{{route('documentacions.edit', [$documentacion->id])}}"><i
                                                        class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                    Editar</a>
                                                </li>
                                                <li><hr class="dropdown-divider"></li>
                                                <li>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#removeProjectModal" data-log-id="{{ $documentacion->id }}">
                                                        <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Eliminar
                                                    </a>
                                                </li>
                                            </ul>
                                        </div></td>

                                </tr>
                            @endforeach
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>

    <!-- Start Create Project Modal -->
    <!-- Modal para el zoom de la imagen -->
    <div class="modal fade" id="imagenZoomModal" tabindex="-1" aria-labelledby="imagenZoomModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <!-- Aquí se mostrará la imagen -->
                    <img id="imagenZoom" src="" class="img-fluid" alt="Zoom Imagen">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Create Project Modal -->


    <script>
        $(document).ready(function() {
            $('#editModal').on('hidden.bs.modal', function () {
                window.history.pushState({}, document.title, window.location.pathname);
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Limpia la URL después de cerrar el modal de edición
            $('#editModal').on('hidden.bs.modal', function () {
                window.history.pushState({}, document.title, window.location.pathname);
            });

            // Limpia la URL después de cerrar el modal de creación
            $('#showModal').on('hidden.bs.modal', function () {
                window.history.pushState({}, document.title, window.location.pathname);
            });

            // Opcional: Limpia la URL después de una operación de creación exitosa
            // Esto dependerá de cómo manejes la respuesta de la creación
            // Si recargas la página o rediriges al usuario, puedes incluir la lógica aquí
        });
    </script>



    <!-- Modal -->
    <div class="modal fade" id="createTask" tabindex="-1" aria-labelledby="createTaskLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0">
                <div class="modal-header p-3 bg-soft-success">
                    <h5 class="modal-title" id="createTaskLabel">Crear Documentacion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" id="createTaskBtn-close" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="task-error-msg" class="alert alert-danger py-2"></div>
                    <form method="POST" class="tablelist-form" action="{{route('documentacions.store')}}"  enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="taskid-input" class="form-control">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese el Nombre" required
                                   @class(['border-red-500' => $errors->has('nombre')])
                                   value="{{ old('nombre')}}"/>
                            @error('nombre')
                            <p class="error">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3 position-relative">
                            <label for="descripcion" class="form-label">Descripcion</label>
                            <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Ingrese Descripcion" required
                                   @class(['border-red-500' => $errors->has('descripcion')])
                                   value="{{ old('descripcion')}}"/>
                            @error('descripcion')
                            <p class="error">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="row g-4 mb-3">
                            <div class="col-lg-6">
                                <label for="fecha_creacion" class="form-label">Fecha Creacion</label>
                                <input type="date" name="fecha_creacion" id="fecha_creacion" class="form-control"
                                       @class(['border-red-500' => $errors->has('fecha_creacion')])
                                       value="{{old('fecha_creacion')}}"/>
                                @error('fecha_creacion')
                                <p class="error">{{$message}}</p>
                                @enderror
                            </div>
                            <!--end col-->
                            <div class="col-lg-6">
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
                            <!--end col-->
                            <div class="col-lg-6">
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
                            <!--end col-->
                            <div class="col-lg-6">
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
                            <!--end col-->
                            <div class="col-lg-6">
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
                            <!--end col-->
                            <div class="mb-3">

                                <!-- Multiple Files Input Example -->
                                    <label for="archivo" class="form-label">Archivo</label>
                                    <input class="form-control" type="file" name="archivo[]" id="archivo" multiple>
                            </div>
                        </div>



                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-ghost-success" data-bs-dismiss="modal"><i class="ri-close-fill align-bottom"></i> Close</button>
                            <button type="submit" class="btn btn-success w-sm">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--end create taks-->
<!-- Modal -->

    <div id="removeProjectModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            id="close-modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mt-2 text-center">
                        <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                   colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                        <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                            <h4>Estas Seguro ?</h4>
                            <p class="text-muted mx-4 mb-0">Estas Seguro que Quieres Eliminar Esta Documentacion ?</p>
                        </div>


                    </div>                <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                        <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Cerrar</button>
                        <!-- Nota: La acción del formulario se establecerá dinámicamente -->
                        <<form action="{{ route('documentacions.destroy', $documentacion->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn w-sm btn-danger">Si, Borralo!</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <!-- removeFileItemModal -->

    <!--end delete modal -->
    <div class="modal fade zoomIn" id="createTipoModal" tabindex="-1" aria-labelledby="createEstadoModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header p-3 bg-soft-success">
                    <h5 class="modal-title" id="createEstadoModalLabel">Crear Tipo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" id="addProjectBtn-close" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" class="tablelist-form" action="{{route('tipo_documentacions.store1')}}"  enctype="multipart/form-data">
                       @csrf
                        <div class="mb-4">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese Nombre" required
                                   @class(['border-red-500' => $errors->has('nombre')])
                                   value="{{ old('nombre')}}"/>
                            @error('nombre')
                            <p class="error">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="descripcion" class="form-label">Descripcion</label>
                            <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Ingrese Descripcion" required
                                   @class(['border-red-500' => $errors->has('descripcion')])
                                   value="{{ old('descripcion')}}"/>
                            @error('descripcion')
                            <p class="error">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-ghost-success" data-bs-dismiss="modal"><i class="ri-close-line align-bottom"></i> Close</button>
                            <button type="submit" class="btn btn-primary" id="addNewProject">Agregar Tipo</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end modal-dialog -->
    </div>
    <div class="modal fade zoomIn" id="createEstadoModal" tabindex="-1" aria-labelledby="createEstadoModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header p-3 bg-soft-success">
                    <h5 class="modal-title" id="createEstadoModalLabel">Crear Estado</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" id="addProjectBtn-close" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" class="tablelist-form" action="{{route('estado_documentacions.store1')}}"  enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese Nombre" required
                                   @class(['border-red-500' => $errors->has('nombre')])
                                   value="{{ old('nombre')}}"/>
                            @error('nombre')
                            <p class="error">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="descripcion" class="form-label">Descripcion</label>
                            <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Ingrese Descripcion" required
                                   @class(['border-red-500' => $errors->has('descripcion')])
                                   value="{{ old('descripcion')}}"/>
                            @error('descripcion')
                            <p class="error">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-ghost-success" data-bs-dismiss="modal"><i class="ri-close-line align-bottom"></i> Close</button>
                            <button type="submit" class="btn btn-primary" id="addNewProject">Add Project</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end modal-dialog -->
    </div><div class="modal fade zoomIn" id="createCategoriaModal" tabindex="-1" aria-labelledby="createEstadoModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header p-3 bg-soft-success">
                    <h5 class="modal-title" id="createEstadoModalLabel">Crear Categoria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" id="addProjectBtn-close" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" class="tablelist-form" action="{{route('categoria_documentacions.store1')}}"  enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese Nombre" required
                                   @class(['border-red-500' => $errors->has('nombre')])
                                   value="{{ old('nombre')}}"/>
                            @error('nombre')
                            <p class="error">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="descripcion" class="form-label">Descripcion</label>
                            <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Ingrese Descripcion" required
                                   @class(['border-red-500' => $errors->has('descripcion')])
                                   value="{{ old('descripcion')}}"/>
                            @error('descripcion')
                            <p class="error">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-ghost-success" data-bs-dismiss="modal"><i class="ri-close-line align-bottom"></i> Close</button>
                            <button type="submit" class="btn btn-primary" id="addNewProject">Add Project</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end modal-dialog -->
    </div>
    <script>
        function showImage(src) {
            // Configura el src de la imagen en el modal
            document.getElementById('imagenZoom').src = src;
            // Puedes agregar aquí más lógica si necesitas
        }
    </script>

@endsection
@section('script')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

    <script src="{{ URL::asset('build/js/pages/datatables.init.js') }}"></script>

    <script src="{{ URL::asset('build/js/app.js') }}"></script>

    <script src="{{URL::asset('build/libs/dragula/dragula.min.js')}}"></script>
    <script src="{{URL::asset('build/libs/dom-autoscroller/dom-autoscroller.min.js')}}"></script>

    <script src="{{URL::asset('build/js/pages/todo.init.js')}}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
