@extends('layouts.master')
@section('title')
    @lang('Lista de Tareas ')
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Project
        @endslot
        @slot('title')
            Lista de LOG
        @endslot
    @endcomponent
    <div class="row g-4 mb-3">
        <div class="col-sm-auto">
            <div>
                <a href="{{route('logs.create')}}" class="btn btn-success"><i class="ri-add-line align-bottom me-1"></i> Add
                    Log</a>
            </div>
        </div>
        <div class="col-sm">
            <div class="d-flex justify-content-sm-end gap-2">
                <div class="search-box ms-2">
                    <form id="search-form" class="search-box ms-2">
                        <input type="text" class="form-control" placeholder="Buscar" id="search" name="search" value="{{ request('search') }}">
                        <i class="ri-search-line search-icon"></i>
                    </form>
                </div>

                <select class="form-control w-md" name="filter_date" id="filter-date" data-choices data-choices-search-false>
                    <option value="" selected>Todos</option>
                    <option value="Today" {{ request('filter_date') == 'Today' ? 'selected' : '' }}>Hoy</option>
                    <option value="Yesterday" {{ request('filter_date') == 'Yesterday' ? 'selected' : '' }} >Ayer</option>
                    <option value="Last 7 Days" {{ request('filter_date') == 'Last 7 Days' ? 'selected' : '' }} >Ultimos 7 Dias</option>
                    <option value="Last 30 Days" {{ request('filter_date') == 'Last 30 Days' ? 'selected' : '' }}>Ultimos 30 Dias</option>
                    <option value="This Month" {{ request('filter_date') == 'This Month' ? 'selected' : '' }}>Este Mes</option>
                    <option value="Last Year" {{ request('filter_date') == 'Last Year' ? 'selected' : '' }}>Este Año</option>
                </select>
            </div>
        </div>
    </div>



    {{-- Continúa desde la parte superior de tu archivo Blade --}}

    <div class="row">

        @foreach($logs as $log)
            <div class="col-xxl-3 col-sm-6 project-card">

                <div class="card card-height-100">
                    {{-- El resto de la estructura de tu tarjeta --}}
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-muted mb-4">Ultima Vez Actualizado {{ $log->updated_at->diffForHumans()}}</p>
                            </div>
                            <div class="flex-shrink-0">
                                <div class="d-flex gap-1 align-items-center">
                                    <button type="button" class="btn avatar-xs mt-n1 p-0 favourite-btn">
                                        <span class="avatar-title bg-transparent fs-15">
                                            <i class="ri-star-fill"></i>
                                        </span>
                                    </button>
                                    <div class="dropdown">
                                        <button class="btn btn-link text-muted p-1 mt-n2 py-0 text-decoration-none fs-15"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            <i data-feather="more-horizontal" class="icon-sm"></i>
                                        </button>

                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="{{route('logs.show', ['log'=>$log])}}"><i
                                                    class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                View</a>
                                            <a class="dropdown-item" href="{{route('logs.edit', [$log->id])}}"><i
                                                    class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                Editar</a>
                                            <div class="dropdown-divider"></div>

                                            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#removeProjectModal" data-log-id="{{ $log->id }}">
                                                <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Remove
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-column h-100">
                            {{-- Aquí iría el contenido de la tarjeta, como nombre del proyecto, estado, etc. --}}
                            <h5 class="mb-1 fs-15">

                                <a href="{{route('logs.show', ['log'=>$log])}}" class="text-dark">{{ $log->titulo }}</a>
                            </h5>
                            {{-- Fecha de asignación y aproximada (asegúrate de formatear las fechas como desees) --}}
                            <div class="text-muted">
                                <i class="ri-calendar-event-fill me-1 align-bottom"></i>
                                Fecha Inicio {{ $log->fecha_inicio }} -
                                Fecha Finalizacion {{ $log->fecha_finalizacion }} -
                            </div>
                            <div class="mt-2 text-center">
                                <h4 class="card-title mb-0 flex-grow-1">Archivo</h4>

                            </div>
                            <hr>
                            <div class="text-muted">
                                @if($log->archivo)
                                    @php
                                        $archivos = explode(',', $log->archivo);
                                    @endphp

                                    @foreach($archivos as $archivo)
                                        @if(pathinfo($archivo, PATHINFO_EXTENSION) === 'pdf')
                                            <a href="{{ asset('log/archivo/' . $archivo) }}" target="_blank">Ver PDF</a>
                                        @elseif(in_array(pathinfo($archivo, PATHINFO_EXTENSION), ['png', 'jpg', 'jpeg', 'gif']))
                                            <!-- Utilizamos data-bs-toggle y data-bs-target para activar el modal -->

                                            <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#imagenZoomModal"  onclick="showImage('{{ asset('log/archivo/' . $archivo) }}')">
                                                <img src="{{ asset('log/archivo/' . $archivo) }}" alt="archivo" width="50px" height="50px">
                                            </a>
                                        @else
                                            <a href="{{ asset('log/archivo/' . $archivo) }}" >No hay archivo</a>
                                        @endif
                                        <br>
                                    @endforeach
                                @endif
                            </div>


                            {{-- Otros detalles como el progreso de las tareas --}}
                            {{-- ... --}}
                        </div>
                    </div>
                    <div class="card-footer bg-transparent border-top-dashed py-2">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <p class="text-muted mb-4">Creado {{ $log->created_at->diffForHumans()}}</p>

                            </div>


                        </div>

                    </div>
                </div>
            </div>

        @endforeach
    </div>

    {{-- Continúa con el resto de tu archivo Blade --}}

    {{-- Asegúrate de incluir la paginación si es necesario --}}




    <!-- end row -->

        <!-- end col -->
<div>
    @if($logs->count())
        <div class="mt-4">
            {{ $logs->appends(['search' => request('search'), 'filter_date' => request('filter_date')])->links('vendor.pagination.bootstrap-4') }}
        </div>
        @endif
    </div><!-- end row -->

    <!-- END layout-wrapper -->
    <!-- removeProjectModal -->
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


                    </div>                <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                    <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Cerrar</button>
                    <!-- Nota: La acción del formulario se establecerá dinámicamente -->
                    <form id="deleteForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn w-sm btn-danger">Si, Borralo!</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
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
    <script>
        function showImage(src) {
            document.getElementById('imagenZoom').src = src;
        }
    </script>
    </script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var removeProjectModal = document.getElementById('removeProjectModal');
                removeProjectModal.addEventListener('show.bs.modal', function (event) {
                    // Botón que dispara el modal
                    var button = event.relatedTarget;
                    // Extrae el ID del log
                    var logId = button.getAttribute('data-log-id');
                    // Encuentra el formulario dentro del modal y actualiza su acción
                    var form = document.getElementById('deleteForm');
                    form.action = `/logs/${logId}`;
                });
            });


        </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('filter-date').addEventListener('change', function() {
                var filterValue = this.value;
                var url = new URL(window.location.href);
                url.searchParams.set('filter_date', filterValue);
                window.location.href = url;
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var searchInput = document.getElementById('search');

            searchInput.addEventListener('input', debounce(function(e) {
                var searchValue = e.target.value;
                if (searchValue.length >= 3 || searchValue.length === 0) {
                    var url = new URL(window.location.href);
                    url.searchParams.set('search', searchValue);
                    window.location.href = url;
                }
            }, 500)); // Espera 500ms después de que el usuario deja de escribir para realizar la búsqueda

            function debounce(func, wait, immediate) {
                var timeout;
                return function() {
                    var context = this, args = arguments;
                    clearTimeout(timeout);
                    timeout = setTimeout(function() {
                        timeout = null;
                        if (!immediate) func.apply(context, args);
                    }, wait);
                    if (immediate && !timeout) func.apply(context, args);
                };
            };
        });
    </script>
        @endsection
@section('script')
    <script src="{{ URL::asset('build/js/pages/project-list.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
