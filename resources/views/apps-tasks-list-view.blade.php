@extends('layouts.master')
@section('title')
@lang('translation.list-view')
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
                        <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value" data-target="234">0</span>k
                        </h2>
                        <p class="mb-0 text-muted"><span class="badge bg-light text-success mb-0">
                                <i class="ri-arrow-up-line align-middle"></i> 17.32 %
                            </span> vs. previous month</p>
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
                        <p class="fw-medium text-muted mb-0">Tareas Pendientes</p>
                        <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value" data-target="64.5">0</span>k</h2>
                        <p class="mb-0 text-muted"><span class="badge bg-light text-danger mb-0">
                                <i class="ri-arrow-down-line align-middle"></i> 0.87 %
                            </span> vs. previous month</p>
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
                        <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value" data-target="64.5">0</span>k</h2>
                        <p class="mb-0 text-muted"><span class="badge bg-light text-danger mb-0">
                                <i class="ri-arrow-down-line align-middle"></i> 0.87 %
                            </span> vs. previous month</p>
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
                        <p class="fw-medium text-muted mb-0">Tareas Completadas</p>
                        <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value" data-target="116.21">0</span>K</h2>
                        <p class="mb-0 text-muted"><span class="badge bg-light text-danger mb-0">
                                <i class="ri-arrow-down-line align-middle"></i> 2.52 %
                            </span> vs. previous month</p>
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
                        <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value" data-target="14.84">0</span>%</h2>
                        <p class="mb-0 text-muted"><span class="badge bg-light text-success mb-0">
                                <i class="ri-arrow-up-line align-middle"></i> 0.63 %
                            </span> vs. previous month</p>
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
                <form>
                    <div class="row g-3">
                        <div class="col-xxl-5 col-sm-12">
                            <div class="search-box">
                                <input type="text" class="form-control search bg-light border-light" placeholder="Buscar por Tareas o Otra Cosa...">
                                <i class="ri-search-line search-icon"></i>
                            </div>
                        </div>
                        <!--end col-->

                        <div class="col-xxl-3 col-sm-4">
                            <input type="text" class="form-control bg-light border-light" id="demo-datepicker" data-provider="flatpickr" data-date-format="d M, Y" data-range-date="true" placeholder="Seleccionar Rango de Fecha">
                        </div>
                        <!--end col-->

                        <div class="col-xxl-3 col-sm-4">
                            <div class="input-light">
                                <select class="form-control" data-choices data-choices-search-false name="choices-single-default" id="idStatus">
                                    <option value="">Estado</option>
                                    <option value="all" selected>Todos</option>
                                    <option value="New">En Espera</option>
                                    <option value="Pending">En proceso</option>
                                    <option value="Inprogress">Completado</option>
                                    <option value="Completed">Nuevo</option>
                                </select>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-xxl-1 col-sm-4">
                            <button type="button" class="btn btn-primary w-100" onclick="SearchData();"> <i class="ri-equalizer-fill me-1 align-bottom"></i>
                                Filtrar
                            </button>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </form>
            </div>
            <!--end card-body-->
            <div class="card-body">
                <div class="table-responsive table-card mb-4">
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
                                <th class="sort" data-sort="estado">Estado</th>
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
                                <td class="">

                                    <div class="d-flex">
                                        <a href="{{route('tareas.show', ['tarea'=>$tarea])}}" class="flex-grow-1">{{$tarea->id}}</a>
                                        <div class="flex-shrink-0 ms-4">
                                            <ul class="list-inline tasks-list-menu mb-0">
                                                <li class="list-inline-item"><a href="apps-tasks-details"><i class="ri-eye-fill align-bottom me-2 text-muted"></i></a>
                                                </li>
                                                <li class="list-inline-item"> <a class="edit-item-btn" href="#editModal" data-bs-toggle="modal" data-bs-target="#editModal" data-tarea-id="{{ $tarea->id }}">
                                                        <i class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a class="remove-item-btn" data-bs-toggle="modal" href="#deleteOrder">
                                                        <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </td>
                                <td class=""><a href="apps-projects-overview" class="fw-medium link-primary">{{$tarea->glpi_users->name}}</a></td>
                                <td>
                                    <div class="d-flex">
                                        <div class="flex-grow-1">{{$tarea->nombre}}</div>

                                    </div>
                                </td>
                                <td class="">{{$tarea->descripcion}}</td>

                                <td class="">{{$tarea->fecha_asignacion}}</td>
                                <td class="">{{$tarea->fecha_aproximada}}</td>
                                <td class="">{{$tarea->fecha_terminado}}</td>
                                <td class="status"><span class="badge badge-soft-secondary text-uppercase">{{$tarea->estado}}</span></td>
                                <td class="priority"><span class="badge bg-danger text-uppercase">{{$tarea->prioridad}}</span>
                                <td class="">{{$tarea->glpi_tickets->name}}</td>

                                </td>
                            </tr>
                        </tbody>
                    </table>
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
    @endforeach
    <!--end col-->
</div>
<!--end row-->
<div class="col-sm-6">
    @if($tareas->count())
        <nav  class="mt-4">
            {{$tareas->links()}}
        </nav>

    @endif
</div><!-- end col -->
<div class="modal fade flip" id="deleteOrder" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body p-5 text-center">
                <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#405189,secondary:#f06548" style="width:90px;height:90px"></lord-icon>
                <div class="mt-4 text-center">
                    <h4>Estas Seguro de Borrar Esta Tarea ?</h4>
                    <p class="text-muted fs-14 mb-4">Borrar Esta Tarea podra Remover toda esa informacion de la Base de Datos.</p>
                    <div class="hstack gap-2 justify-content-center remove">
                        <button class="btn btn-link btn-ghost-success fw-medium text-decoration-none" data-bs-dismiss="modal" id="deleteRecord-close"><i class="ri-close-line me-1 align-middle"></i> Cerrar</button>
                        <form action="{{route('tareas.destroy',['tarea' =>$tarea->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" id="delete-record">Si, Borralo</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
                    <input type="hidden" id="tasksId" />
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
                                <option value="completado">completado</option>
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
<div class="modal fade zoomIn" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0">
            <div class="modal-header p-3 bg-soft-info">
                <h5 class="modal-title" id="exampleModalLabel">Editar Tarea</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
            </div>
            <form method="POST" class="tablelist-form" action="{{route('tareas.update')}}" autocomplete="off">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <input type="hidden" id="tasksId" />
                    <div class="row g-3">
                        <div class="col-lg-12">
                            <input type="hidden" id="tareaId" name="tarea_id" value="">

                            <label for="id_glpi_users" class="form-label">TECNICO ASIGNADO</label>
                            <select class="form-select" data-choices data-choices-search-false
                                    name="id_glpi_users" id="id_glpi_users"
                                    @class(['border-red-500' => $errors->has('id_glpi_users')])
                                    value="{{$tarea->id_glpi_users}}" >

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
                                       value="{{$tarea->nombre}}"/>
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
                                   value="{{ $tarea->descripcion}}"/>
                            @error('descripcion')
                            <p class="error">{{$message}}</p>
                            @enderror
                        </div>
                        <!--end col-->
                        <div class="col-lg-12">
                            <label for="fecha_asignacion" class="form-label">Fecha Asignacion</label>
                            <input type="date" name="fecha_asignacion" id="fecha_asignacion" class="form-control"
                                   @class(['border-red-500' => $errors->has('fecha_asignacion')])
                                   value="{{$tarea->fecha_asignacion}}"/>
                            @error('fecha_asignacion')
                            <p class="error">{{$message}}</p>
                            @enderror
                        </div>
                        <!--end col--><div class="col-lg-12">
                            <label for="fecha_aproximada" class="form-label">Fecha Aproximada</label>
                            <input type="date" name="fecha_aproximada" id="fecha_aproximada" class="form-control"
                                   @class(['border-red-500' => $errors->has('fecha_aproximada')])
                                   value="{{$tarea->fecha_aproximada}}"/>
                            @error('fecha_aproximada')
                            <p class="error">{{$message}}</p>
                            @enderror
                        </div>
                        <!--end col--><div class="col-lg-12">
                            <label for="fecha_terminado" class="form-label">Fecha Terminado</label>
                            <input type="date" name="fecha_terminado" id="fecha_terminado" class="form-control"
                                   @class(['border-red-500' => $errors->has('fecha_terminado')])
                                   value="{{$tarea->fecha_terminado}}"/>
                            @error('fecha_terminado')
                            <p class="error">{{$message}}</p>
                            @enderror
                        </div>
                        <!--end col-->
                        <div class="col-lg-6">
                            <label for="estado" class="form-label">Estado</label>
                            <select required name="estado" class="form-control" data-choices data-choices-search-false id="estado" value="{{$tarea->estado}}">

                                <option value="nuevo">nuevo</option>
                                <option value="en proceso">en proceso</option>
                                <option value="en espera">en espera</option>
                                <option value="completado">completado</option>
                            </select>
                        </div>
                        <!--end col-->
                        <div class="col-lg-6">
                            <label for="prioridad" class="form-label">Prioridad</label>
                            <select required name="prioridad" class="form-control" data-choices data-choices-search-false id="prioridad" value="{{$tarea->prioridad}}">
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
                                    @class(['border-red-500' => $errors->has('id_glpi_tickets')])
                                    value="{{$tarea->id_glpi_tickets}}" >

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
<script>
    $('#editModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Botón que disparó el modal
        var tareaId = button.data('tarea-id'); // Extrae el ID de la tarea
        var modal = $(this);
        modal.find('#tareaId').val(tareaId); // Asigna el ID de la tarea al input oculto en el modal
    });
</script>

<!--end modal-->
@endsection
@section('script')
<script src="{{ URL::asset('build/libs/list.js/list.min.js') }}"></script>
<script src="{{ URL::asset('build/libs/list.pagination.js/list.pagination.min.js') }}"></script>
<script src="{{ URL::asset('build/js/pages/tasks-list.init.js') }}"></script>
<script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
