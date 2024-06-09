@extends('layouts.master')
@section('title') @lang('Tarea Detalle ') @endsection
@section('content')

    <div class="row">
        <div class="col-xxl-3">
            <div class="card">
                <div class="card-body text-center">
                    <h6 class="card-title mb-3 flex-grow-1 text-start">Tiempo Para Realizar La Tarea</h6>
                    <div class="mb-2">
                        <lord-icon src="https://cdn.lordicon.com/kbtmbyzy.json" trigger="loop" colors="primary:#405189,secondary:#02a8b5" style="width:90px;height:90px">
                        </lord-icon>
                    </div>
                    @if($tarea->completado)
                        <h3 class="mb-1">Completado a Tiempo</h3>
                    @else
                        <h3 class="mb-1">{{ $tarea->dias_restantes }}</h3>
                    @endif
                    <h5 class="fs-14 mb-4">DÍA POR TERMINAR</h5>
                    <div class="hstack gap-2 justify-content-center">
                        @if($tarea->estado == 'borrado')
                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                data-bs-target="#removeProjectModal"><i class="ri-stop-circle-line align-bottom me-1"></i> Borrar</button>
                        @endif
                            <a class="btn btn-success btn-sm" href="{{route('tareas.edit', [$tarea->id])}}"><i class="ri-play-circle-line align-bottom me-1"></i> Editar</a>

                            <!-- Botón Terminado -->
                        @if($tarea->estado != 'terminado')
                            <form action="{{ route('tareas.completar', $tarea) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-sm"><i class="ri-checkbox-circle-line align-bottom me-1"></i> Terminado</button>
                            </form>
                        @endif
                        @if($tarea->estado != 'en proceso')
                            <form action="{{ route('tareas.revertir', $tarea) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-warning btn-sm">Revertir</button>
                            </form>
                        @endif
                            @if($tarea->estado != 'borrado')
                            <form action="{{ route('tareas.borrar', $tarea) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-warning btn-sm">Borrar</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div><!--end card-->
            <div class="card mb-3">
                <div class="card-body">
                    <div class="mb-4">
                        <select class="form-control" name="choices-single-default" data-choices data-choices-search-false>
                            <option value="">Seleccione Estado de la Tarea</option>
                            <option value="nuevo">Nuevo</option>
                            <option value="en espera">En espera</option>
                            <option value="en proceso">En proceso</option>
                            <option value="completado" selected>Completado</option>
                        </select>
                    </div>
                    <div class="table-card">
                        <table class="table mb-0">
                            <tbody>
                            <tr>
                                <td class="fw-medium">No. Tarea</td>
                                <td>{{$tarea->id}}</td>
                            </tr>
                            <tr>
                                <td class="fw-medium">Nombre Tarea</td>
                                <td>{{$tarea->nombre}}</td>
                            </tr>
                            <tr>
                                <td class="fw-medium">Fecha Asignacion</td>
                                <td>{{$tarea->fecha_asignacion}}</td>
                            </tr><tr>
                                <td class="fw-medium">Fecha Aproximada</td>
                                <td>{{$tarea->fecha_aproximada}}</td>
                            </tr>
                            <tr>
                                <td class="fw-medium">Prioridad</td>
                                <td><span class="badge badge-soft-danger">{{$tarea->prioridad}}</span></td>
                            </tr>
                            <tr>
                                <td class="fw-medium">Estado</td>
                                <td><span class="badge badge-soft-secondary">{{$tarea->estado}}</span></td>
                            </tr>
                            <tr>
                                <td class="fw-medium">Fecha Terminada</td>
                                <td>{{$tarea->fecha_terminado}}</td>
                            </tr>
                            </tbody>
                        </table><!--end table-->
                    </div>
                </div>
            </div><!--end card-->
            <div class="card mb-3">
                <div class="card-body">
                    <div class="d-flex mb-3">
                        <h6 class="card-title mb-0 flex-grow-1">Tecnico Asignado</h6>
                        {{--
                            PARA CUANDO LO HAGA DE MUCHOS TECNICOS ASIGNADOS PROXIMAMENTE
                        <div class="flex-shrink-0">
                            <button type="button" class="btn btn-soft-danger btn-sm" data-bs-toggle="modal" data-bs-target="#inviteMembersModal"><i class="ri-share-line me-1 align-bottom"></i> Assigned Member</button>
                        </div>--}}
                    </div>
                    <ul class="list-unstyled vstack gap-3 mb-0">
                        <li>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <h6 class="mb-1"><a href="">{{$tarea->glpi_users->id}}</a></h6>

                                </div>
                                <div class="flex-grow-1 ms-2">
                                    <h6 class="mb-1"><a href="">{{$tarea->glpi_users->name}}</a></h6>
                                    <p class="text-muted mb-0">{{$tarea->glpi_users->name}}</p>
                                </div>

                            </div>
                        </li>

                    </ul>
                </div>
            </div><!--end card-->
            {{--<div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-3">Attachments</h5>
                    <div class="vstack gap-2">
                        <div class="border rounded border-dashed p-2">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar-sm">
                                        <div class="avatar-title bg-light text-secondary rounded fs-24">
                                            <i class="ri-folder-zip-line"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="fs-13 mb-1"><a href="javascript:void(0);" class="text-body text-truncate d-block">App pages.zip</a></h5>
                                    <div>2.2MB</div>
                                </div>
                                <div class="flex-shrink-0 ms-2">
                                    <div class="d-flex gap-1">
                                        <button type="button" class="btn btn-icon text-muted btn-sm fs-18"><i class="ri-download-2-line"></i></button>
                                        <div class="dropdown">
                                            <button class="btn btn-icon text-muted btn-sm fs-18 dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ri-more-fill"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Rename</a></li>
                                                <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="border rounded border-dashed p-2">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar-sm">
                                        <div class="avatar-title bg-light text-secondary rounded fs-24">
                                            <i class="ri-file-ppt-2-line"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="fs-13 mb-1"><a href="javascript:void(0);" class="text-body text-truncate d-block">Velzon admin.ppt</a></h5>
                                    <div>2.4MB</div>
                                </div>
                                <div class="flex-shrink-0 ms-2">
                                    <div class="d-flex gap-1">
                                        <button type="button" class="btn btn-icon text-muted btn-sm fs-18"><i class="ri-download-2-line"></i></button>
                                        <div class="dropdown">
                                            <button class="btn btn-icon text-muted btn-sm fs-18 dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ri-more-fill"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Rename</a></li>
                                                <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="border rounded border-dashed p-2">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar-sm">
                                        <div class="avatar-title bg-light text-secondary rounded fs-24">
                                            <i class="ri-folder-zip-line"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="fs-13 mb-1"><a href="javascript:void(0);" class="text-body text-truncate d-block">Images.zip</a></h5>
                                    <div>1.2MB</div>
                                </div>
                                <div class="flex-shrink-0 ms-2">
                                    <div class="d-flex gap-1">
                                        <button type="button" class="btn btn-icon text-muted btn-sm fs-18"><i class="ri-download-2-line"></i></button>
                                        <div class="dropdown">
                                            <button class="btn btn-icon text-muted btn-sm fs-18 dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ri-more-fill"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Rename</a></li>
                                                <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2 text-center">
                            <button type="button" class="btn btn-success">View more</button>
                        </div>
                    </div>
                </div>
            </div>  PROXIMAMENTE COLOCAR LO QUE SERIA ARCHIVO
            --}} <!--end card-->
        </div><!---end col-->
        <div class="col-xxl-9">
            <div class="card">
                <div class="card-body">
                    <div class="text-muted">
                        <h6 class="mb-3 fw-semibold text-uppercase">Descripcion</h6>
                        <p>{{$tarea->descripcion}}</p>

                        <h6 class="mb-3 fw-semibold text-uppercase">Observacion</h6>
                        <ul class=" ps-3 list-unstyled vstack gap-2">
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="productTask">
                                    <label class="form-check-label" for="productTask">
                                        {{$tarea->observacion}}
                                    </label>
                                </div>
                            </li>

                        </ul>

                        <div class="pt-3 border-top border-top-dashed mt-4">
                            <h6 class="mb-3 fw-semibold text-uppercase">Historico</h6>
                            <div class="hstack flex-wrap gap-2 fs-15">
                                <div class="badge fw-medium badge-soft-info">Creado {{$tarea->created_at->diffForHumans()}}</div>
                                <div class="badge fw-medium badge-soft-info">Actualizado {{$tarea->updated_at->diffForHumans()}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end card-->

        </div><!--end col-->
    </div><!--end row-->

    <div class="modal fade" id="inviteMembersModal" tabindex="-1" aria-labelledby="inviteMembersModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0">
                <div class="modal-header p-3 ps-4 bg-soft-success">
                    <h5 class="modal-title" id="inviteMembersModalLabel">AGREGAR OTRO TECNICO</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="search-box mb-3">
                        <input type="text" class="form-control bg-light border-light" placeholder="Search here...">
                        <i class="ri-search-line search-icon"></i>
                    </div>

                    <div class="mb-4 d-flex align-items-center">
                        <div class="me-2">
                            <h5 class="mb-0 fs-13">Tecnicos :</h5>
                        </div>
                        <div class="avatar-group justify-content-center">
                            <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Tonya Noble">
                                <div class="avatar-xs">
                                    <img src="{{ URL::asset('build/images/users/avatar-10.jpg') }}" alt="" class="rounded-circle img-fluid">
                                </div>
                            </a>
                            <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Thomas Taylor">
                                <div class="avatar-xs">
                                    <img src="{{ URL::asset('build/images/users/avatar-8.jpg') }}" alt="" class="rounded-circle img-fluid">
                                </div>
                            </a>
                            <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Nancy Martino">
                                <div class="avatar-xs">
                                    <img src="{{ URL::asset('build/images/users/avatar-2.jpg') }}" alt="" class="rounded-circle img-fluid">
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="mx-n4 px-4" data-simplebar style="max-height: 225px;">
                        <div class="vstack gap-3">
                            <div class="d-flex align-items-center">
                                <div class="avatar-xs flex-shrink-0 me-3">
                                    <img src="{{ URL::asset('build/images/users/avatar-2.jpg') }}" alt="" class="img-fluid rounded-circle">
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="fs-13 mb-0"><a href="javascript:void(0);" class="text-body d-block">Nancy Martino</a></h5>
                                </div>
                                <div class="flex-shrink-0">
                                    <button type="button" class="btn btn-light btn-sm">Add</button>
                                </div>
                            </div>
                            <!-- end member item -->
                            <div class="d-flex align-items-center">
                                <div class="avatar-xs flex-shrink-0 me-3">
                                    <div class="avatar-title bg-soft-danger text-danger rounded-circle">
                                        HB
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="fs-13 mb-0"><a href="javascript:void(0);" class="text-body d-block">Henry Baird</a></h5>
                                </div>
                                <div class="flex-shrink-0">
                                    <button type="button" class="btn btn-light btn-sm">Add</button>
                                </div>
                            </div>
                            <!-- end member item -->
                            <div class="d-flex align-items-center">
                                <div class="avatar-xs flex-shrink-0 me-3">
                                    <img src="{{ URL::asset('build/images/users/avatar-3.jpg') }}" alt="" class="img-fluid rounded-circle">
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="fs-13 mb-0"><a href="javascript:void(0);" class="text-body d-block">Frank Hook</a></h5>
                                </div>
                                <div class="flex-shrink-0">
                                    <button type="button" class="btn btn-light btn-sm">Add</button>
                                </div>
                            </div>
                            <!-- end member item -->
                            <div class="d-flex align-items-center">
                                <div class="avatar-xs flex-shrink-0 me-3">
                                    <img src="{{ URL::asset('build/images/users/avatar-4.jpg') }}" alt="" class="img-fluid rounded-circle">
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="fs-13 mb-0"><a href="javascript:void(0);" class="text-body d-block">Jennifer Carter</a></h5>
                                </div>
                                <div class="flex-shrink-0">
                                    <button type="button" class="btn btn-light btn-sm">Add</button>
                                </div>
                            </div>
                            <!-- end member item -->
                            <div class="d-flex align-items-center">
                                <div class="avatar-xs flex-shrink-0 me-3">
                                    <div class="avatar-title bg-soft-success text-success rounded-circle">
                                        AC
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="fs-13 mb-0"><a href="javascript:void(0);" class="text-body d-block">Alexis Clarke</a></h5>
                                </div>
                                <div class="flex-shrink-0">
                                    <button type="button" class="btn btn-light btn-sm">Add</button>
                                </div>
                            </div>
                            <!-- end member item -->
                            <div class="d-flex align-items-center">
                                <div class="avatar-xs flex-shrink-0 me-3">
                                    <img src="{{ URL::asset('build/images/users/avatar-7.jpg') }}" alt="" class="img-fluid rounded-circle">
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="fs-13 mb-0"><a href="javascript:void(0);" class="text-body d-block">Joseph Parker</a></h5>
                                </div>
                                <div class="flex-shrink-0">
                                    <button type="button" class="btn btn-light btn-sm">Add</button>
                                </div>
                            </div>
                            <!-- end member item -->
                        </div>
                        <!-- end list -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light w-xs" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success w-xs">Assigned</button>
                </div>
            </div>
            <!-- end modal-content -->
        </div>
        <!-- modal-dialog -->
    </div>

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
                            <p class="text-muted mx-4 mb-0">Estas Seguro que Quieres Eliminar Este Log ?</p>
                        </div>
                    </div>
                    <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                        <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Cerrar</button>
                        <form action="{{route('tareas.destroy',['tarea' =>$tarea->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn w-sm btn-danger"  id="remove-project">Si, Borralo!</button>

                        </form>
                    </div>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- end modal -->
@endsection
@section('script')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
