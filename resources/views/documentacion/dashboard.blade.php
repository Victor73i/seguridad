@extends('layouts.master')
@section('title') @lang('Documentacion') @endsection
@section('content')

    @component('components.breadcrumb')
        @slot('li_1') Dashboards @endslot
        @slot('title') Documentacion @endslot
    @endcomponent
    <div class="row project-wrapper">
        <div class="col-xxl-8">
            <div class="row">


                <div id="estados-container" class="row">
                    <!-- Aquí se insertarán las tarjetas de estado dinámicamente -->
                </div>
            </div></div></div>
            </div><!-- end row -->

            <div class="row">
                <div class="col-xl-4">
                    <div class="card card-height-25">
                        <div class="card-header border-0 align-items-center d-flex justify-content-between">
                            <h4 class="card-title mb-0 flex-grow-1">Documentacion</h4>
                            <div class="button-group" role="group" aria-label="Basic example">
                                <!-- Añade la clase .filter-btn a cada botón -->
                                <button type="button" class="btn btn-outline-primary filter-btn" data-filter="ALL">ALL</button>
                                <button type="button" class="btn btn-outline-primary filter-btn" data-filter="1D">1D</button>
                                <button type="button" class="btn btn-outline-primary filter-btn" data-filter="1S">1S</button>
                                <button type="button" class="btn btn-outline-primary filter-btn" data-filter="1M">1M</button>
                                <button type="button" class="btn btn-outline-primary filter-btn" data-filter="6M">6M</button>
                                <button type="button" class="btn btn-outline-primary filter-btn" data-filter="1Y">1Y</button>
                            </div>
                        </div><!-- end card header -->

                        <!-- ... El resto de tu código ... -->

                        <div class="card-body p-0 pb-2">
                            <div>
                                <!-- Elemento canvas para Chart.js -->
                                <canvas id="projects-overview-chart" width="400" height="400"></canvas>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-xxl-4">
                    <div class="card">
                        <div class="card-header border-0">
                            <h4 class="card-title mb-0">Últimos Documentacion</h4>
                        </div><!-- end cardheader -->
                        <div class="card-body pt-0">
                            <h6 class="text-uppercase fw-semibold mt-4 mb-3 text-muted">Últimos Registros:</h6>
                            <div class="upcoming-scheduled">
                                {{-- Bucle para mostrar cada evento/equipo IT --}}
                                @foreach($ultimosDocumentacion as $documentacion)
                                    <div class="d-flex align-items-center mb-4">
                                        {{-- Aquí iría el icono o imagen que represente al equipo --}}
                                        <div class="flex-shrink-0 avatar-sm">
                        <span class="avatar-title bg-soft-primary text-primary rounded-circle fs-4">
                            {{-- Icono o iniciales --}}
                            <i class="ri-computer-line"></i>
                        </span>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="mb-1">{{ $documentacion->nombre }}</h6>
                                            <p class="text-muted mb-0">Tipo: {{ $documentacion->descripcion }} - {{ $documentacion->tipo_documentacion->nombre}}</p>
                                        </div>
                                        <div class="flex-shrink-0">
                                            {{-- Aquí podrías poner la fecha de registro o cualquier otra información --}}
                                            <p class="text-muted mb-0">{{ $documentacion->fecha_creacion}}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="mt-3 text-center">
                                <a href="{{ route('documentacions.index') }}" class="btn btn-primary">Ver Todos los Documentos</a>
                            </div>
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->
            </div><!-- end row -->

            <div class="row">
                <div class="col-xl-9">
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
                                        <th scope="col">Descripcion</th>
                                        <th scope="col">Fecha Creacion</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Tipo</th>
                                        <th scope="col">Categoria</th>
                                        <th scope="col">Usuario</th>
                                        <th scope="col">Action</th>

                                    </tr><!-- end tr -->
                                    </thead><!-- thead -->

                                    <tbody>
                                    @foreach($documentacions as $documentacion)

                                        <tr>

                                            <td class="id">{{$documentacion->id}}</td>


                                            <td class="nombre">{{$documentacion->nombre}}</td>

                                            <td class="descripcion">{{$documentacion->descripcion}}</td>
                                            <td class="fecha_creacion">{{$documentacion->fecha_creacion}}</td>
                                            <td class="descripcion">{{$documentacion->estado_documentacion->nombre}}</td>
                                            <td class="descripcion">{{$documentacion->tipo_documentacion->nombre}}</td>
                                            <td class="descripcion">{{$documentacion->categoria_documentacion->nombre}}</td>
                                            <td class="descripcion">{{$documentacion->glpi_users->name}}</td>


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
                                                                       href="{{route('documentacions.show', [$documentacion->id])}}"><i
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
                                            @if ($documentacions->onFirstPage())
                                                <li class="page-item disabled">
                                                    <span class="page-link">Anterior</span>
                                                </li>
                                            @else
                                                <li class="page-item">
                                                    <a class="page-link" href="{{ $documentacions->previousPageUrl() }}">Anterior</a>
                                                </li>
                                            @endif

                                            {{-- Pagination Elements --}}
                                            @foreach(range(1, $documentacions->lastPage()) as $i)
                                                @if($i >= $documentacions->currentPage() - 2 && $i <= $documentacions->currentPage() + 2)
                                                    @if ($i == $documentacions->currentPage())
                                                        <li class="page-item active"><span class="page-link">{{ $i }}</span></li>
                                                    @else
                                                        <li class="page-item"><a class="page-link" href="{{ $documentacions->url($i) }}">{{ $i }}</a></li>
                                                    @endif
                                                @endif
                                            @endforeach

                                            {{-- Next Page Link --}}
                                            @if ($documentacions->hasMorePages())
                                                <li class="page-item">
                                                    <a class="page-link" href="{{ $documentacions->nextPageUrl() }}">Siguiente</a>
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

                <div class="col-xl-4">
                    <div class="card card-height-100">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Estatus Estado de Documentación</h4>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div style="display: flex; justify-content: center; align-items: center; height: 400px;">
                                <canvas id="documentacion-status-chart" width="400" height="400"></canvas>
                            </div>
                            <div id="total-documentacion" class="text-center">
                                <!-- El total se actualizará dinámicamente -->
                                <strong>Total Documentación:</strong> <span id="total-doc-count">0</span> Documentos
                            </div>
                            <!-- Contadores para cada estado -->
                            <div class="mt-3">
                                <div id="documentacion-status-counters">
                                    <!-- Se generan dinámicamente con JS -->
                                </div>
                            </div>
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->
                <div class="col-xl-4">
                    <div class="card card-height-100">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Estatus Categoría de Documentación</h4>
                        </div>
                        <div class="card-body">
                            <div style="display: flex; justify-content: center; align-items: center; height: 400px;">
                                <canvas id="categoria-documentacion-chart" width="400" height="400"></canvas>
                            </div>
                            <div id="total-categoria" class="text-center">
                                <!-- El total se actualizará dinámicamente -->
                                <strong>Total Documentación:</strong> <span id="total-cat-count">0</span> Documentos
                            </div>
                            <!-- Contadores para cada estado -->
                            <div class="mt-3">
                                <div id="documentacion-categorias-counters">
                                    <!-- Se generan dinámicamente con JS -->
                                </div>
                            </div>
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->
                <div class="col-xl-4">
                    <div class="card card-height-100">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Estatus Tipo de Documentación</h4>
                        </div>
                        <div class="card-body">
                            <div style="display: flex; justify-content: center; align-items: center; height: 400px;">
                                <canvas id="tipo-documentacion-chart" width="400" height="400"></canvas>
                            </div>
                            <div id="total-tipo" class="text-center">
                                <!-- El total se actualizará dinámicamente -->
                                <strong>Total Documentación:</strong> <span id="total-tip-count">0</span> Documentos
                            </div>
                            <!-- Contadores para cada estado -->
                            <div class="mt-3">
                                <div id="documentacion-tipos-counters">
                                    <!-- Se generan dinámicamente con JS -->
                                </div>
                            </div>
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->
            </div><!-- end row -->

            @endsection

            @section('script')

                <!-- Cargar Chart.js si aún no se ha cargado -->
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                <!-- Script para generar la gráfica -->
                <script>
                    document.addEventListener("DOMContentLoaded", function(){
                        fetch('/documentacions/status')
                            .then(response => response.json())
                            .then(data => {
                                // Total de documentación
                                const totalDocumentacion = data.estados.reduce((acc, estado) => acc + estado.documentacions_count, 0);
                                const totalCategorias = data.categorias.reduce((sum, cat) => sum + cat.documentacions_count, 0);
                                const totalTipos = data.tipos.reduce((sum, tipo) => sum + tipo.documentacions_count, 0);


                                // Actualizar el total en la página
                                document.getElementById('total-doc-count').textContent = totalDocumentacion;
                                document.getElementById('total-cat-count').textContent = totalCategorias;
                                document.getElementById('total-tip-count').textContent = totalTipos;


                                // Generar gráficas y contadores para cada tipo
                                generateChartAndCounters('documentacion-status-chart', 'documentacion-status-counters', data.estados);
                                generateChartAndCounters('categoria-documentacion-chart', 'documentacion-categorias-counters', data.categorias);
                                generateChartAndCounters('tipo-documentacion-chart', 'documentacion-tipos-counters', data.tipos);
                            })
                            .catch(error => console.error('Error al obtener el estado de la documentación:', error));
                    });

                    function generateChartAndCounters(canvasId, countersId, items) {
                        const ctx = document.getElementById(canvasId).getContext('2d');
                        const countersContainer = document.getElementById(countersId);

                        // Limpia los contadores existentes
                        countersContainer.innerHTML = '';

                        // Datos para la gráfica
                        const labels = items.map(item => item.nombre);
                        const data = items.map(item => item.documentacions_count);
                        const backgroundColor = ['rgba(54, 162, 235, 0.2)', /* otros colores */];
                        const borderColor = ['rgba(54, 162, 235, 1)', /* otros colores */];

                        // Crea la gráfica
                        new Chart(ctx, {
                            type: 'doughnut',
                            data: {
                                labels: labels,
                                datasets: [{
                                    label: 'Documentación',
                                    data: data,
                                    backgroundColor: [
                                        'rgba(54, 162, 235, 0.2)',
                                        'rgba(255, 206, 86, 0.2)',
                                        'rgba(75, 192, 192, 0.2)',
                                        'rgba(153, 102, 255, 0.2)',
                                        'rgba(255, 159, 64, 0.2)'
                                    ],
                                    borderColor: [
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(153, 102, 255, 1)',
                                        'rgba(255, 159, 64, 1)'
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false
                            }
                        });

                        // Crea y añade los contadores para cada item
                        items.forEach(item => {
                            const counterDiv = document.createElement('div');
                            counterDiv.classList.add('d-flex', 'justify-content-between', 'py-2');
                            counterDiv.innerHTML = `
            <p class="fw-medium mb-0">${item.nombre}</p>
            <div>
                <span class="text-muted">${item.documentacions_count} Documentos</span>
            </div>
        `;
                            countersContainer.appendChild(counterDiv);
                        });
                    }
                </script>

                <script>
                    function generateRandomColor() {
                        var randomColor = '#' + Math.floor(Math.random()*16777215).toString(16);
                        return randomColor;
                    }

                    document.addEventListener("DOMContentLoaded", function() {
                        const filterButtons = document.querySelectorAll(".filter-btn");


                        // Generar un mapa de colores para cada estado
                        let colorMap = new Map();

                        // Asigna un color único al total para destacarlo.
                        const totalColor = 'rgba(54, 162, 235, 0.2)';

                        function drawChart(documentaciones, totalsByDate) {
                            const ctx = document.getElementById('projects-overview-chart').getContext('2d');

                            if (window.projectsOverviewChart instanceof Chart) {
                                window.projectsOverviewChart.destroy();
                            }

                            // Crea un arreglo que incluirá todos los datasets (conjuntos de datos).
                            let datasets = [];

                            // Agrega el dataset para el total.
                            datasets.push({
                                label: 'Total',
                                data: totalsByDate.map(total => ({
                                    x: `${total.dia}/${total.mes}/${total.año}`,
                                    y: total.total ? total.total : 0
                                })),
                                backgroundColor: totalColor,
                                borderColor: totalColor,
                                borderWidth: 2,
                                type: 'bar', // Esto crea una línea en el gráfico
                            });

                            // Crea datasets para cada estado.
                            let estados = [...new Set(documentaciones.map(d => d.nombre_estado))];
                            estados.forEach((estado) => {
                                if (!colorMap.has(estado)) {
                                    colorMap.set(estado, generateRandomColor());
                                }
                                // Filtrar sólo las documentaciones que tienen una cantidad para este estado
                                let estadoData = documentaciones.filter(d => d.nombre_estado === estado && d.cantidad);
                                if (estadoData.length > 0) {
                                    datasets.push({
                                        label: estado,
                                        data: estadoData.map(d => ({
                                            x: `${d.dia}/${d.mes}/${d.año}`,
                                            y: d.cantidad
                                        })),
                                        backgroundColor: colorMap.get(estado),
                                        borderColor: colorMap.get(estado),
                                        borderWidth: 1,
                                        barThickness: 20, // Ajusta el grosor de la barra como necesites
                                        type: 'bar',
                                    });
                                }
                            });

                            // Crea el gráfico.
                            window.projectsOverviewChart = new Chart(ctx, {
                                type: 'bar', // El tipo predeterminado para el gráfico, puedes tener varios tipos en un gráfico mixto.
                                data: { datasets },
                                options: {
                                    scales: {
                                        x: {
                                            stacked: false
                                        },
                                        y: {
                                            beginAtZero: true,
                                            stacked: false,
                                            // Asegúrate de que solo se muestren enteros en la escala Y
                                            ticks: {
                                                stepSize: 1, // Esto hará que la escala de ticks vaya en incrementos de uno
                                                callback: function(value) {
                                                    if (value % 1 === 0) { // Solo muestra valores enteros
                                                        return value;
                                                    }
                                                },
                                            }
                                        },
                                        // Definir múltiples ejes Y para diferentes datasets si es necesario
                                        // ...
                                    },
                                    plugins: {
                                        legend: {
                                            display: true
                                        },
                                        tooltip: {
                                            enabled: true
                                        }
                                    }
                                }
                            });
                        }


                        function fetchDataAndGenerateChart(filter) {
                            fetch(`/documentacions/status-by-month-and-status?filter=${filter}`)
                                .then(response => response.json())
                                .then(data => {
                                    drawChart(data.documentaciones, data.totalsByDate); // Asegúrate de pasar data.totalsByDate aquí
                                })
                                .catch(error => console.error('Error:', error));
                        }

                        filterButtons.forEach(button => {
                            button.addEventListener('click', function() {
                                const filter = this.getAttribute('data-filter');
                                fetchDataAndGenerateChart(filter);
                            });
                        });

                        // Llama al filtro por defecto para cargar inicialmente los datos del día actual
                        fetchDataAndGenerateChart('ALL');
                    });
                </script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Obtener la información de estado del backend
        fetch('/documentacions/status')
            .then(response => response.json())
            .then(data => {
                const estadosContainer = document.querySelector('#estados-container');
                estadosContainer.innerHTML = '';
                let totalDocumentos = 0;

                data.estados.forEach(estado => {
                    totalDocumentos += estado.documentacions_count; // Sumar el contador de cada estado para obtener el total
                    const cardHTML = `
                    <div class="col-xl-3 col-sm-6">
                        <div class="card card-animate">
                            <div class="card-body">
                                <!-- Contenido de la tarjeta para cada estado -->
                                <p class="text-uppercase fw-medium text-muted text-truncate mb-3">
                                    Estado: ${estado.nombre}
                                </p>
                                <h4 class="fs-4 flex-grow-1 mb-0">
                                    <span class="counter-value" data-target="${estado.documentacions_count}">
                                        ${estado.documentacions_count}
                                    </span> Documentos
                                </h4>
                            </div><!-- end card body -->
                        </div>
                    </div><!-- end col -->
                `;
                    estadosContainer.insertAdjacentHTML('beforeend', cardHTML);
                });

                // Crear y añadir la tarjeta para el total de documentaciones
                const totalCardHTML = `
                <div class="col-xl-3 col-sm-6">
                    <div class="card card-animate bg-soft-primary text-white">
                        <div class="card-body">
                            <!-- Contenido de la tarjeta para el total -->
                            <p class="text-uppercase fw-medium text-truncate mb-3">Total Documentos</p>
                            <h4 class="fs-4 flex-grow-1 mb-0">
                                <span class="counter-value" data-target="${totalDocumentos}">
                                    ${totalDocumentos}
                                </span>
                            </h4>
                        </div><!-- end card body -->
                    </div>
                </div><!-- end col -->
            `;
                estadosContainer.insertAdjacentHTML('afterbegin', totalCardHTML);

                // Re-inicializar Feather Icons si se están utilizando
                if (window.feather) {
                    feather.replace();
                }
            })
            .catch(error => {
                console.error('Error al obtener los estados:', error);
            });
    });
   </script>
                <!-- apexcharts -->

@endsection
