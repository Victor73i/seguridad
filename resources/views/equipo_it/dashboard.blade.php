@extends('layouts.master')
@section('title') @lang('EQUIPO IT ') @endsection
@section('css')
    <style>
        .pagination-container .pagination .page-link {
            color: #fff; /* Color de texto */
            background-color: #007bff; /* Color de fondo */
            border: 1px solid #007bff; /* Color del borde */
        }

        .pagination-container .pagination .page-item.active .page-link {
            background-color: #0069d9; /* Color de fondo para el ítem activo */
            border-color: #005cbf; /* Color del borde para el ítem activo */
        }

        .pagination-container .pagination .page-item.disabled .page-link {
            color: #6c757d; /* Color de texto para ítems desactivados */
            background-color: #e9ecef; /* Color de fondo para ítems desactivados */
            border-color: #dee2e6; /* Color del borde para ítems desactivados */
        }

    </style>
@endsection
@section('content')

    @component('components.breadcrumb')
        @slot('li_1') Dashboards @endslot
        @slot('title') EQUIPO IT @endslot
    @endcomponent
    <div class="row project-wrapper">
        <div class="col-xxl-8">
            <div class="row">
                <div class="col-xl-4">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="avatar-sm flex-shrink-0">
                                    <span
                                        class="avatar-title bg-soft-primary text-primary rounded-2 fs-2">
                                        <i data-feather="briefcase" class="text-primary"></i>
                                    </span>
                                </div>
                                <div class="flex-grow-1 overflow-hidden ms-3">
                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-3">
                                        Computadoras</p>
                                    <div class="d-flex align-items-center mb-3">
                                        <h4 class="fs-4 flex-grow-1 mb-0">{{ $conteoComputadoras }} Equipos</h4>

                                    </div>
                                    <p class="text-muted text-truncate mb-0">Equipos en el GLPI</p>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div>
                </div><!-- end col -->

                <div class="col-xl-4">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="avatar-sm flex-shrink-0">
                                    <span
                                        class="avatar-title bg-soft-warning text-warning rounded-2 fs-2">
                                        <i data-feather="award" class="text-warning"></i>
                                    </span>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <p class="text-uppercase fw-medium text-muted mb-3">Impresoras</p>
                                    <div class="d-flex align-items-center mb-3">
                                        <h4 class="fs-4 flex-grow-1 mb-0">{{ $conteoImpresoras }} Equipos</h4>

                                    </div>
                                    <p class="text-muted mb-0">Equipos en el GLPI</p>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div>
                </div><!-- end col -->

                <div class="col-xl-4">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-soft-info text-info rounded-2 fs-2">
                                        <i data-feather="clock" class="text-info"></i>
                                    </span>
                                </div>
                                <div class="flex-grow-1 overflow-hidden ms-3">
                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-3">
                                        PDU</p>
                                    <div class="d-flex align-items-center mb-3">
                                        <h4 class="fs-4 flex-grow-1 mb-0">{{ $conteoPdus }} Equipos</h4>

                                    </div>
                                    <p class="text-muted text-truncate mb-0">Equipos en el GLPI</p>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div>
                </div><!-- end col -->
            </div><!-- end row -->

            <div class="row">
                <div class="col-xl-12">
                    <div class="card card-height-100">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Estatus Equipo IT</h4>

                        </div><!-- end card header -->

                        <div class="card-body">
                            <div style="display: flex; justify-content: center; align-items: center; height: 400px;">
                                <canvas id="projects-status-chart" width="400" height="400"></canvas>
                            </div>


                            <div class="mt-3">
                                <div class="d-flex justify-content-center align-items-center mb-4">
                                    <div>
                                        <p class="text-muted mb-0">Total Equipos IT</p>
                                        <h2 class="me-3 ff-secondary mb-0" id="totalEquiposIT">0</h2> <!-- Inicializar con 0 o con el valor del servidor -->


                                    </div>

                                </div>

                                <div
                                    class="d-flex justify-content-between border-bottom border-bottom-dashed py-2">
                                    <h4 class="fs-4 flex-grow-1 mb-0">
                                        <p class="fw-medium mb-0">Computadoras</p>
                                        <div>
                                            <span class="text-muted pe-5">{{ $conteoComputadoras }} Equipos</span>
                                        </div>
                                    </h4>
                                    <h4 class="fs-4 flex-grow-1 mb-0">
                                        <p class="fw-medium mb-0">IMPRESORAS</p>
                                        <div>
                                            <span class="text-muted pe-5">{{ $conteoImpresoras }} Equipos</span>
                                        </div>
                                    </h4>
                                    <h4 class="fs-4 flex-grow-1 mb-0">
                                        <p class="fw-medium mb-0">PDUS</p>
                                        <div>
                                            <span class="text-muted pe-5">{{ $conteoPdus }} Equipos</span>
                                        </div>
                                    </h4>
                                </div><!-- end -->

                            </div>
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end col -->

        <div class="col-xxl-4">
            <div class="card">
                <div class="card-header border-0">
                    <h4 class="card-title mb-0">Últimos Equipos IT</h4>
                </div><!-- end cardheader -->
                <div class="card-body pt-0">
                    <h6 class="text-uppercase fw-semibold mt-4 mb-3 text-muted">Últimos Registros:</h6>
                    <div class="upcoming-scheduled">
                        {{-- Bucle para mostrar cada evento/equipo IT --}}
                        @foreach($ultimosEquiposIt as $equipoit)
                            <div class="d-flex align-items-center mb-4">
                                {{-- Aquí iría el icono o imagen que represente al equipo --}}
                                <div class="flex-shrink-0 avatar-sm">
                        <span class="avatar-title bg-soft-primary text-primary rounded-circle fs-4">
                            {{-- Icono o iniciales --}}
                            <i class="ri-computer-line"></i>
                        </span>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-1">{{ $equipoit->nombre }}</h6>
                                    <p class="text-muted mb-0">Tipo: {{ $equipoit->type }} - {{ $equipoit->glpiComputers->name ?? $equipoit->glpiPrinters->name ?? $equipoit->glpiPdus->name }}</p>
                                </div>
                                <div class="flex-shrink-0">
                                    {{-- Aquí podrías poner la fecha de registro o cualquier otra información --}}
                                    <p class="text-muted mb-0">{{ $equipoit->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-3 text-center">
                        <a href="{{ route('equipo_its.index') }}" class="btn btn-primary">Ver Todos los Equipos IT</a>
                    </div>
                </div><!-- end cardbody -->
            </div><!-- end card -->
        </div><!-- end col -->
    </div><!-- end row -->
    <div class="row">
        <div class="col-xl-7">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h4 class="card-title flex-grow-1 mb-0">EQUIPO IT</h4>

                </div><!-- end cardheader -->
                <div class="card-body">
                    <div class="table-responsive table-card">
                        <table class="table table-nowrap table-centered align-middle">
                            <thead class="bg-light text-muted">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Type</th>
                                <th scope="col">Equipo</th>
                                <th scope="col">Action</th>

                            </tr><!-- end tr -->
                            </thead><!-- thead -->

                            <tbody>
                            @foreach($equiposIt as $equipoit)

                                <tr>

                                    <td class="nombre">{{$equipoit->id}}</td>


                                    <td class="nombre">{{$equipoit->nombre}}</td>

                                    <td class="tipo">{{$equipoit->type}}</td>

                                    @if($equipoit->glpiComputers)
                                        <td class="equipo">{{$equipoit->glpiComputers->name}}</td>
                                    @elseif($equipoit->glpiPdus)
                                        <td class="equipo">{{$equipoit->glpiPdus->name}}</td>
                                    @else
                                        <td class="equipo">{{$equipoit->glpiPrinters->name}}</td>
                                    @endif
                                    <td>
                                        <ul class="list-inline hstack gap-2 mb-0">

                                            <li class="list-inline-item">
                                                <div class="dropdown">
                                                    <button
                                                        class="btn btn-soft-secondary btn-sm dropdown"
                                                        type="button" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="ri-more-fill align-middle"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a class="dropdown-item view-item-btn"
                                                               href="{{route('equipo_its.show', [$equipoit->id])}}"><i
                                                                    class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                                Vista</a></li>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table><!-- end table -->
                        <div class="pagination-container">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    {{-- Previous Page Link --}}
                                    @if ($equiposIt->onFirstPage())
                                        <li class="page-item disabled">
                                            <span class="page-link">Anterior</span>
                                        </li>
                                    @else
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $equiposIt->previousPageUrl() }}">Anterior</a>
                                        </li>
                                    @endif

                                    {{-- Pagination Elements --}}
                                    @foreach(range(1, $equiposIt->lastPage()) as $i)
                                        @if($i >= $equiposIt->currentPage() - 2 && $i <= $equiposIt->currentPage() + 2)
                                            @if ($i == $equiposIt->currentPage())
                                                <li class="page-item active"><span class="page-link">{{ $i }}</span></li>
                                            @else
                                                <li class="page-item"><a class="page-link" href="{{ $equiposIt->url($i) }}">{{ $i }}</a></li>
                                            @endif
                                        @endif
                                    @endforeach

                                    {{-- Next Page Link --}}
                                    @if ($equiposIt->hasMorePages())
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $equiposIt->nextPageUrl() }}">Siguiente</a>
                                        </li>
                                    @else
                                        <li class="page-item disabled">
                                            <span class="page-link">Siguiente</span>
                                        </li>
                                    @endif
                                </ul>
                            </nav>
                        </div>
                        <div class="noresult" style="display: none">
                            <div class="text-center">
                                <lord-icon src="https://cdn.lordicon.com/msoeawqm.json"
                                           trigger="loop" colors="primary:#121331,secondary:#08a88a"
                                           style="width:75px;height:75px">
                                </lord-icon>
                                <h5 class="mt-2">Sorry! No Result Found</h5>
                                <p class="text-muted mb-0">We've searched more than 150+ contacts We
                                    did not find any
                                    contacts for you search.</p>
                            </div>
                        </div>
                    </div>



                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->


    </div><!-- end row -->



    <div class="col-xxl-4 col-lg-6">

    </div><!-- end col -->
    </div><!-- end row -->
@endsection
@section('script')

    <script>
        // Usando Fetch API para obtener los datos
        fetch('/equipo_its/status')
            .then(response => response.json())
            .then(data => {
                // Selecciona el canvas por su nuevo id
                const ctx = document.getElementById('projects-status-chart').getContext('2d');
                const myChart = new Chart(ctx, {
                    type: 'doughnut', // o 'pie' si prefieres una gráfica de pastel
                    data: {
                        labels: ['Computadoras', 'Impresoras', 'PDUs'],
                        datasets: [{
                            label: 'Estatus Equipo IT',
                            data: [data.conteoComputadoras, data.conteoImpresoras, data.conteoPdus],
                            backgroundColor: [
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                            ],
                            borderColor: [
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        // Opciones de personalización para Chart.js
                    }
                });

                // Actualizar total de equipos IT
                document.getElementById('totalEquiposIT').textContent = data.conteoComputadoras + data.conteoImpresoras + data.conteoPdus;
            })
            .catch(error => console.error('Error al obtener el estado del equipo IT:', error));
    </script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- apexcharts -->

    <script src="{{ URL::asset('build/js/pages/dashboard-projects.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
