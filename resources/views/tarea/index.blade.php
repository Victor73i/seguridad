@extends('layouts.master')
@section('title')
    @lang('Tarea ')
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Tarea
        @endslot
        @slot('title')
            Lista de Tareas
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-xxl-3 col-sm-6">
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="fw-medium text-muted mb-0">Tareas Totales</p>
                            <h2 class="mt-4 ff-secondary fw-semibold">{{$totalTarea}}
                            </h2>
                            <p class="mb-0 text-muted"><span class="badge bg-light text-success mb-0">
                                <i class="ri-arrow-up-line align-middle"></i> {{$totalTarea}}
                            </span> </p>
                        </div>
                        <div>
                            <div class="avatar-sm flex-shrink-0">
                            <span class="avatar-title bg-soft-info text-info rounded-circle fs-4">
                                <i class="ri-ticket-2-line"></i>
                            </span>
                            </div>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div> <!-- end card-->
        </div>
        <!--end col-->
        <div class="col-xxl-3 col-sm-6">
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="fw-medium text-muted mb-0">Tareas En Espera</p>
                            <h2 class="mt-4 ff-secondary fw-semibold">{{$conteoEnEspera}}</h2>
                            <p class="mb-0 text-muted"><span class="badge bg-light text-danger mb-0">
                                <i class="ri-arrow-down-line align-middle"></i>{{$conteoEnEspera}}
                            </span> </p>
                        </div>
                        <div>
                            <div class="avatar-sm flex-shrink-0">
                            <span class="avatar-title bg-soft-warning text-warning rounded-circle fs-4">
                                <i class="mdi mdi-timer-sand"></i>
                            </span>
                            </div>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div>
        </div><div class="col-xxl-3 col-sm-6">
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="fw-medium text-muted mb-0">Tareas En Proceso</p>
                            <h2 class="mt-4 ff-secondary fw-semibold">{{$conteoEnProceso}}</h2>
                            <p class="mb-0 text-muted"><span class="badge bg-light text-danger mb-0">
                                <i class="ri-arrow-down-line align-middle"></i> {{$conteoEnProceso}}
                            </span> </p>
                        </div>
                        <div>
                            <div class="avatar-sm flex-shrink-0">
                            <span class="avatar-title bg-soft-warning text-warning rounded-circle fs-4">
                                <i class="mdi mdi-timer-sand"></i>
                            </span>
                            </div>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div>
        </div>
        <!--end col-->
        <div class="col-xxl-3 col-sm-6">
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="fw-medium text-muted mb-0">Tareas Finalizadas</p>
                            <h2 class="mt-4 ff-secondary fw-semibold">{{$conteoFinalizado}}</h2>
                            <p class="mb-0 text-muted"><span class="badge bg-light text-danger mb-0">
                                <i class="ri-arrow-down-line align-middle"></i> {{$conteoFinalizado}}
                            </span> </p>
                        </div>
                        <div>
                            <div class="avatar-sm flex-shrink-0">
                            <span class="avatar-title bg-soft-success text-success rounded-circle fs-4">
                                <i class="ri-checkbox-circle-line"></i>
                            </span>
                            </div>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div>
        </div>
        <!--end col-->
        <div class="col-xxl-3 col-sm-6">
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="fw-medium text-muted mb-0">Tareas Borradas</p>
                            <h2 class="mt-4 ff-secondary fw-semibold">{{$conteoBorrado}}</h2>
                            <p class="mb-0 text-muted"><span class="badge bg-light text-success mb-0">
                                <i class="ri-arrow-up-line align-middle"></i> {{$conteoBorrado}}
                            </span> </p>
                        </div>
                        <div>
                            <div class="avatar-sm flex-shrink-0">
                            <span class="avatar-title bg-soft-danger text-danger rounded-circle fs-4">
                                <i class="ri-delete-bin-line"></i>
                            </span>
                            </div>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->

    <div class="row">
        <div class="col-lg-12">
            <div class="card" id="tasksList">
                <div class="card-header border-0">
                    <div class="d-flex align-items-center">
                        <h5 class="card-title mb-0 flex-grow-1">Todas las Tareas</h5>
                        <div class="flex-shrink-0">
                            <div class="d-flex flex-wrap gap-2">
                                <button class="btn btn-danger add-btn" data-bs-toggle="modal" data-bs-target="#showModal"><i class="ri-add-line align-bottom me-1"></i> Crear Tarea</button>
                                <button class="btn btn-soft-danger" id="remove-actions" onClick="deleteMultiple()"><i class="ri-delete-bin-2-line"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body border border-dashed border-end-0 border-start-0">

                        <div class="row g-3">

                            <!--end col-->
                            <div class="col-md-4">
                                <div class="search-box">
                                    <input type="text" class="form-control search" id="search" placeholder="Buscar...">
                                    <i class="ri-search-line search-icon"></i>
                                </div>

                            </div>
                            <div class="col-md-auto ms-auto">
                                <div class="d-flex align-items-center gap-2">
                                    <span class="text-muted">Filtrar por: </span>
                                    <select class="form-control mb-0" id="filter-by-type">
                                        <option value="ALL">Todos</option>
                                        <option value="en proceso">En Proceso</option>
                                        <option value="en espera">En Espera</option>
                                        <option value="nuevo">Nuevo</option>
                                        <option value="finalizado">Finalizado</option>
                                        <option value="borrado">Borrado</option>
                                        <!-- Otras opciones de filtrado -->
                                    </select>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->

                </div>
                <!--end card-body-->
                <div class="card-body">

                    <div class="table-responsive table-card mb-4" id="taskTableContainer">
                        <table class="table align-middle table-nowrap mb-0" id="tasksTable">
                            <thead class="table-light text-muted">
                            <tr>
                                <th scope="col" style="width: 40px;">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                    </div>
                                </th>
                                <th class="sort" data-sort="id">ID</th>
                                <th class="sort" data-sort="glpi_users">Tecnico Asignado</th>
                                <th class="sort" data-sort="nombre">Nombre</th>
                                <th class="sort" data-sort="descripcion">Descripcion</th>
                                <th class="sort" data-sort="fecha_asignacion">Fecha Asignacion</th>
                                <th class="sort" data-sort="fecha_aproximada">Fecha Aproximada</th>
                                <th class="sort" data-sort="fecha_terminada">Fecha Terminada</th>
                                <th class="sort" data-sort="status">Estado</th>
                                <th class="sort" data-sort="prioridad">Prioridad</th>
                                <th class="sort" data-sort="glpi_tickets">TIcket</th>
                            </tr>
                            </thead>
                            <tbody class="list form-check-all">
                            @foreach($tareas as $tarea)

                                <tr>
                                    <th scope="row">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="chk_child" value="option1">
                                        </div>
                                    </th>
                                    <td class="id">

                                        <div class="d-flex">
                                            <a href="{{route('tareas.show', ['tarea'=>$tarea])}}" class="flex-grow-1">{{$tarea->id}}</a>
                                            <div class="flex-shrink-0 ms-4">
                                                <ul class="list-inline tasks-list-menu mb-0">
                                                    <li class="list-inline-item"><a href="{{route('tareas.show', ['tarea'=>$tarea])}}"><i class="ri-eye-fill align-bottom me-2 text-muted"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="project_name"><a  class="fw-medium link-primary">{{ $tarea->glpi_users->name ?? 'Sin Usuario' }}</a></td>
                                    <td class="client_name">
                                        <div class="d-flex">
                                            <div class="flex-grow-1" name="nombre">{{$tarea->nombre}}</div>

                                        </div>
                                    </td>
                                    <td class="assignedto">{{$tarea->descripcion}}</td>

                                    <td class="due_date">{{$tarea->fecha_asignacion}}</td>
                                    <td class="fecha_aproximada">{{$tarea->fecha_aproximada}}</td>
                                    <td class="fecha_terminado">{{$tarea->fecha_terminado}}</td>
                                    <td class="status">{{$tarea->estado }}</td>
                                    <td class="priority"><span class="badge bg-danger text-uppercase">{{$tarea->prioridad}}</span>
                                    <td class="tickets">{{ $tarea->glpi_tickets->name ?? 'Sin Tickets' }}</td>

                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        <div class="align-items-center mt-4 pt-2 justify-content-between row text-center text-sm-start">
                            <div class="pagination-container">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center">
                                        {{-- Previous Page Link --}}
                                        @if ($tareas->onFirstPage())
                                            <li class="page-item disabled">
                                                <span class="page-link">Anterior</span>
                                            </li>
                                        @else
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $tareas->previousPageUrl() }}">Anterior</a>
                                            </li>
                                        @endif

                                        {{-- Pagination Elements --}}
                                        @foreach(range(1, $tareas->lastPage()) as $i)
                                            @if($i >= $tareas->currentPage() - 2 && $i <= $tareas->currentPage() + 2)
                                                @if ($i == $tareas->currentPage())
                                                    <li class="page-item active"><span class="page-link">{{ $i }}</span></li>
                                                @else
                                                    <li class="page-item"><a class="page-link" href="{{ $tareas->url($i) }}">{{ $i }}</a></li>
                                                @endif
                                            @endif
                                        @endforeach

                                        {{-- Next Page Link --}}
                                        @if ($tareas->hasMorePages())
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $tareas->nextPageUrl() }}">Siguiente</a>
                                            </li>
                                        @else
                                            <li class="page-item disabled">
                                                <span class="page-link">Siguiente</span>
                                            </li>
                                        @endif
                                    </ul>
                                </nav>

                            </div>
                        </div>

                        <!--end table-->
                        <div class="noresult" style="display: none">
                            <div class="text-center">
                                <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px"></lord-icon>
                                <h5 class="mt-2">Lo Siento! El Resultado no es encontrado</h5>
                                <p class="text-muted mb-0">Talvez sea Otra busqueda de Tarea.</p>
                            </div>
                        </div>
                    </div>

                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
    </div>
    <!--end row-->


    <!--end delete modal -->

    <div class="modal fade zoomIn" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0">
                <div class="modal-header p-3 bg-soft-info">
                    <h5 class="modal-title" id="exampleModalLabel">Crear Tarea</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                </div>
                <form method="POST" class="tablelist-form" action="{{route('tareas.store')}}" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-lg-12">
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
                            <!--end col-->
                            <div class="col-lg-12">
                                <div>
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese el Nombre" required
                                           @class(['border-red-500' => $errors->has('nombre')])
                                           value="{{ old('nombre')}}"/>
                                    @error('nombre')
                                    <p class="error">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-lg-12">
                                <label for="descripcion" class="form-label">Descripcion</label>
                                <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Ingrese Descripcion" required
                                       @class(['border-red-500' => $errors->has('descripcion')])
                                       value="{{ old('descripcion')}}"/>
                                @error('descripcion')
                                <p class="error">{{$message}}</p>
                                @enderror
                            </div>
                            <!--end col-->
                            <div class="col-lg-12">
                                <label for="fecha_asignacion" class="form-label">Fecha Asignacion</label>
                                <input type="date" name="fecha_asignacion" id="fecha_asignacion" class="form-control"
                                       @class(['border-red-500' => $errors->has('fecha_asignacion')])
                                       value="{{old('fecha_asignacion')}}"/>
                                @error('fecha_asignacion')
                                <p class="error">{{$message}}</p>
                                @enderror
                            </div>
                            <!--end col--><div class="col-lg-12">
                                <label for="fecha_aproximada" class="form-label">Fecha Aproximada</label>
                                <input type="date" name="fecha_aproximada" id="fecha_aproximada" class="form-control"
                                       @class(['border-red-500' => $errors->has('fecha_aproximada')])
                                       value="{{old('fecha_aproximada')}}"/>
                                @error('fecha_aproximada')
                                <p class="error">{{$message}}</p>
                                @enderror
                            </div>
                            <!--end col--><div class="col-lg-12">
                                <label for="fecha_terminado" class="form-label">Fecha Terminado</label>
                                <input type="date" name="fecha_terminado" id="fecha_terminado" class="form-control"
                                       @class(['border-red-500' => $errors->has('fecha_terminado')])
                                       value="{{old('fecha_terminado')}}"/>
                                @error('fecha_terminado')
                                <p class="error">{{$message}}</p>
                                @enderror
                            </div>
                            <!--end col-->
                            <div class="col-lg-6">
                                <label for="estado" class="form-label">Estado</label>
                                <select required name="estado" class="form-control" data-choices data-choices-search-false id="estado">
                                    <option value="">Estado</option>
                                    <option value="nuevo">nuevo</option>
                                    <option value="en proceso">en proceso</option>
                                    <option value="en espera">en espera</option>
                                    <option value="finalizado">Finalizado</option>
                                </select>
                            </div>
                            <!--end col-->
                            <div class="col-lg-6">
                                <label for="prioridad" class="form-label">Prioridad</label>
                                <select required name="prioridad" class="form-control" data-choices data-choices-search-false id="prioridad">
                                    <option value="">Prioridad</option>
                                    <option value="baja">Baja</option>
                                    <option value="media">Media</option>
                                    <option value="Alta">Alta</option>
                                </select>
                            </div>
                            <!--end col-->
                            <div class="col-lg-12">
                                <label for="observacion" class="form-label">Observacion</label>
                                <input type="text" name="observacion" id="observacion" class="form-control" placeholder="Ingrese Observacion" required
                                       @class(['border-red-500' => $errors->has('observacion')])
                                       value="{{ old('observacion')}}"/>
                                @error('observacion')
                                <p class="error">{{$message}}</p>
                                @enderror
                            </div>
                            <!--end col-->
                            <div class="col-lg-12">
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
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-light" id="close-modal" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" id="add-btn">Add Task</button>
                            {{-- <button type="button" class="btn btn-success" id="edit-btn">Update Task</button> --}}
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--end modal-->



    <!--end modal-->
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/list.js/2.3.1/list.min.js"></script>


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
    <script>
        flatpickr('#demo-datepicker', {
            mode: 'range',
            dateFormat: 'Y-m-d',
        });
    </script>
    <script>
        flatpickr('#fecha_inicio', {
            dateFormat: 'Y-m-d',
        });
        flatpickr('#fecha_fin', {
            dateFormat: 'Y-m-d',
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var options = {
                valueNames: ['id', 'project_name', 'client_name', 'status', 'priority', 'due_date', 'tickets', 'fecha_aproximada', 'fecha_terminado']
            };

            var taskList = new List('tasksList', options);

            // Esta función filtra los elementos de la lista basado en el estado.
            function applyFilter(selection) {
                taskList.filter(function(item) {
                    var itemStatus = item.values().status.toLowerCase(); // Convierte el estado del item a minúsculas para comparación
                    if (selection === 'all') {
                        return itemStatus !== 'borrado'; // Excluye los borrados
                    } else if (selection === 'borrado') {
                        return itemStatus === 'borrado'; // Muestra solo los borrados
                    } else {
                        return itemStatus === selection; // Filtra por el estado específico
                    }
                });
            }

            // Aplica el filtro inicialmente para 'all' excluyendo 'borrado'
            applyFilter('all');

            $('#filter-by-type').on('change', function() {
                var selection = this.value.toLowerCase(); // Obtiene el valor seleccionado y convierte a minúsculas
                applyFilter(selection);
            });
        });
    </script>


@endsection
