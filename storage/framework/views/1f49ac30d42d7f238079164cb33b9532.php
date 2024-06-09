
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('Log'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?> Dashboards <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?> Log <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <div class="row project-wrapper">
        <div class="col-xxl-8">
            <div class="row">


                <div id="estados-container" class="row">
                    <!-- Aquí se insertarán las tarjetas de estado dinámicamente -->
                </div>

            </div></div></div>


            <div class="row">
                <div class="col-xl-5">
                    <div class="card">
                        <div class="card-header border-0 align-items-center d-flex justify-content-between">
                            <h4 class="card-title mb-0 flex-grow-1">Log</h4>
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
                            <h4 class="card-title mb-0">Últimos Logs</h4>
                        </div><!-- end cardheader -->
                        <div class="card-body pt-0">
                            <h6 class="text-uppercase fw-semibold mt-4 mb-3 text-muted">Últimos Registros:</h6>
                            <div class="upcoming-scheduled">
                                
                                <?php $__currentLoopData = $ultimosLog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="d-flex align-items-center mb-4">
                                        
                                        <div class="flex-shrink-0 avatar-sm">
                        <span class="avatar-title bg-soft-primary text-primary rounded-circle fs-4">
                            
                            <i class="ri-computer-line"></i>
                        </span>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="mb-1"><?php echo e($log->titulo); ?></h6>
                                            <p class="text-muted mb-0"><?php echo e($log->observaciones); ?> - <?php echo e($log->estado_log->nombre); ?></p>
                                        </div>
                                        <div class="flex-shrink-0">
                                            
                                            <p class="text-muted mb-0"><?php echo e($log->fecha_finalizacion); ?></p>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <div class="mt-3 text-center">
                                <a href="<?php echo e(route('logs.index')); ?>" class="btn btn-primary">Ver Todos los Logs</a>
                            </div>
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->
            </div><!-- end row -->

            <div class="row">
                <div class="col-xl-14">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h4 class="card-title flex-grow-1 mb-0">Log</h4>
                            <div class="flex-shrink-0">
                                <div class="dropdown card-header-dropdown">
                                    <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown"
                                       aria-haspopup="true" aria-expanded="false">
                                <span class="text-muted">Filtrado Por: <i
                                        class="mdi mdi-chevron-down ms-1"></i></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#" data-filter="ALL">ALL</a>
                                        <a class="dropdown-item" href="#" data-filter="Recepción">Recepción</a>
                                        <a class="dropdown-item" href="#" data-filter="Diagnóstico">Diagnóstico</a>
                                        <a class="dropdown-item" href="#" data-filter="Entregado">Entregado</a>
                                        <a class="dropdown-item" href="#" data-filter="Cerrado">Cerrado</a>
                                    </div>
                                </div>
                            </div>

                        </div><!-- end cardheader -->
                        <div class="card-body">
                            <div class="table-responsive table-card">
                                <table class="table table-nowrap table-centered align-middle">
                                    <thead class="bg-light text-muted">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Observaciones</th>
                                        <th scope="col">Fecha Finalizacion</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Usuario</th>
                                        <th scope="col">Action</th>

                                    </tr><!-- end tr -->
                                    </thead><!-- thead -->

                                    <tbody>
                                    <?php $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <tr>

                                            <td class="id"><?php echo e($log->id); ?></td>


                                            <td class="nombre"><?php echo e($log->titulo); ?></td>

                                            <td class="descripcion"><?php echo e($log->observaciones); ?></td>
                                            <td class="fecha_creacion"><?php echo e($log->fecha_finalizacion); ?></td>
                                            <td class="descripcion"><?php echo e($log->estado_log->nombre); ?></td>
                                            <td class="descripcion"><?php echo e($log->glpi_users->name); ?></td>


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
                                                                       href="<?php echo e(route('logs.show', [$log->id])); ?>"><i
                                                                            class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                                        Vista</a></li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </tbody>
                                </table><!-- end table -->
                                <div class="pagination-container">
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination justify-content-center">
                                            
                                            <?php if($logs->onFirstPage()): ?>
                                                <li class="page-item disabled">
                                                    <span class="page-link">Anterior</span>
                                                </li>
                                            <?php else: ?>
                                                <li class="page-item">
                                                    <a class="page-link" href="<?php echo e($logs->previousPageUrl()); ?>">Anterior</a>
                                                </li>
                                            <?php endif; ?>

                                            
                                            <?php $__currentLoopData = range(1, $logs->lastPage()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($i >= $logs->currentPage() - 2 && $i <= $logs->currentPage() + 2): ?>
                                                    <?php if($i == $logs->currentPage()): ?>
                                                        <li class="page-item active"><span class="page-link"><?php echo e($i); ?></span></li>
                                                    <?php else: ?>
                                                        <li class="page-item"><a class="page-link" href="<?php echo e($logs->url($i)); ?>"><?php echo e($i); ?></a></li>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            
                                            <?php if($logs->hasMorePages()): ?>
                                                <li class="page-item">
                                                    <a class="page-link" href="<?php echo e($logs->nextPageUrl()); ?>">Siguiente</a>
                                                </li>
                                            <?php else: ?>
                                                <li class="page-item disabled">
                                                    <span class="page-link">Siguiente</span>
                                                </li>
                                            <?php endif; ?>
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
                <div class="col-xl-7">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1 py-1">Mi Log</h4>
                            <div class="flex-shrink-0">
                                <div class="dropdown card-header-dropdown">
                                    <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown"
                                       aria-haspopup="true" aria-expanded="false">
                                <span class="text-muted">Filtrado Por: <i
                                        class="mdi mdi-chevron-down ms-1"></i></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#" data-filter="TODOS" data-target="myLogTable">ALL</a>
                                        <!-- No hay otros filtros, pero si agregas, sigue el mismo patrón -->
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card header -->
                        <div class="card-body">
                            <div class="table-responsive table-card">
                                <table
                                    class="table table-borderless table-nowrap table-centered align-middle mb-0">
                                    <thead class="table-light text-muted">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Titulo</th>
                                        <th scope="col">Fecha Finalizacion</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Tickets</th>
                                        <th scope="col">Usuario</th>
                                    </tr>
                                    </thead><!-- end thead -->
                                    <tbody>
                                    <tr>
                                        <?php $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <td class="id"><?php echo e($log->id); ?></td>


                                        <td class="nombre"><?php echo e($log->titulo); ?></td>

                                        <td class="fecha_creacion"><?php echo e($log->fecha_finalizacion); ?></td>
                                        <td class="descripcion"><?php echo e($log->estado_log->nombre); ?></td>
                                        <td class="descripcion"><?php echo e($log->glpi_tickets->name); ?></td>
                                        <td class="descripcion"><?php echo e($log->glpi_users->name); ?></td>
                                    </tr><!-- end -->
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody><!-- end tbody -->
                                </table><!-- end table -->
                            </div>
                            <div class="mt-3 text-center">
                                <a href="<?php echo e(route('logs.index')); ?>" class="text-muted text-decoration-underline">Load
                                    More</a>
                            </div>
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-xl-5">
                    <div class="card card-height-100">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Estatus Estado de Log</h4>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div style="display: flex; justify-content: center; align-items: center; height: 400px;">
                                <canvas id="log-status-chart" width="400" height="400"></canvas>
                            </div>
                            <div id="total-log" class="text-center">
                                <!-- El total se actualizará dinámicamente -->
                                <strong>Total Log:</strong> <span id="total-log-count">0</span> Logs
                            </div>
                            <!-- Contadores para cada estado -->
                            <div class="mt-3">
                                <div id="log-status-counters">
                                    <!-- Se generan dinámicamente con JS -->
                                </div>
                            </div>
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->
            </div><!-- end row -->


            <?php $__env->stopSection(); ?>

            <?php $__env->startSection('script'); ?>

                <!-- Cargar Chart.js si aún no se ha cargado -->
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                <!-- Script para generar la gráfica -->
                <script>
                    document.addEventListener("DOMContentLoaded", function(){
                        fetch('/logs/status')
                            .then(response => response.json())
                            .then(data => {
                                // Total de Log
                                const totalLog = data.estados.reduce((acc, estado) => acc + estado.logs_count, 0);



                                // Actualizar el total en la página
                                document.getElementById('total-log-count').textContent = totalLog;



                                // Generar gráficas y contadores para cada tipo
                                generateChartAndCounters('log-status-chart', 'log-status-counters', data.estados);
                                })
                            .catch(error => console.error('Error al obtener el estado de log:', error));
                    });

                    function generateChartAndCounters(canvasId, countersId, items) {
                        const ctx = document.getElementById(canvasId).getContext('2d');
                        const countersContainer = document.getElementById(countersId);

                        // Limpia los contadores existentes
                        countersContainer.innerHTML = '';

                        // Datos para la gráfica
                        const labels = items.map(item => item.nombre);
                        const data = items.map(item => item.logs_count);
                        const backgroundColor = ['rgba(54, 162, 235, 0.2)', /* otros colores */];
                        const borderColor = ['rgba(54, 162, 235, 1)', /* otros colores */];

                        // Crea la gráfica
                        new Chart(ctx, {
                            type: 'doughnut',
                            data: {
                                labels: labels,
                                datasets: [{
                                    label: 'Log',
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
                <span class="text-muted">${item.logs_count} Logs</span>
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

                        function drawChart(loges, totalsByDate) {
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
                                type: 'line', // Esto crea una línea en el gráfico
                            });

                            // Crea datasets para cada estado.
                            let estados = [...new Set(loges.map(d => d.nombre_estado))];
                            estados.forEach((estado) => {
                                if (!colorMap.has(estado)) {
                                    colorMap.set(estado, generateRandomColor());
                                }
                                // Filtrar sólo las documentaciones que tienen una cantidad para este estado
                                let estadoData = loges.filter(d => d.nombre_estado === estado && d.cantidad);
                                if (estadoData.length > 0) {
                                    datasets.push({
                                        label: estado,
                                        data: estadoData.map(d => ({
                                            x: `${d.dia}/${d.mes}/${d.año}`,
                                            y: d.cantidad
                                        })),
                                        backgroundColor: colorMap.get(estado),
                                        borderColor: colorMap.get(estado),
                                        borderWidth: 2,
                                        barThickness: 10, // Ajusta el grosor de la barra como necesites
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
                            fetch(`/logs/status-by-month-and-status?filter=${filter}`)
                                .then(response => response.json())
                                .then(data => {
                                    drawChart(data.loges, data.totalsByDate); // Asegúrate de pasar data.totalsByDate aquí
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
                        fetch('/logs/status')
                            .then(response => response.json())
                            .then(data => {
                                const estadosContainer = document.querySelector('#estados-container');
                                estadosContainer.innerHTML = '';
                                let totallogs = 0;

                                data.estados.forEach(estado => {
                                    totallogs += estado.logs_count; // Sumar el contador de cada estado para obtener el total
                                    const cardHTML = `
                    <div class="col-xl-3 col-sm-6">
                        <div class="card card-animate">
                            <div class="card-body">
                                <!-- Contenido de la tarjeta para cada estado -->
                                <p class="text-uppercase fw-medium text-muted text-truncate mb-3">
                                    Estado: ${estado.nombre}
                                </p>
                                <h4 class="fs-4 flex-grow-1 mb-0">
                                    <span class="counter-value" data-target="${estado.logs_count}">
                                        ${estado.logs_count}
                                    </span> Logs
                                </h4>
                            </div><!-- end card body -->
                        </div>
                    </div><!-- end col -->
                `;
                                    estadosContainer.insertAdjacentHTML('beforeend', cardHTML);
                                });

                                // Crear y añadir la tarjeta para el total de Logs
                                const totalCardHTML = `
                <div class="col-xl-3 col-sm-6">
                    <div class="card card-animate bg-soft-primary text-white">
                        <div class="card-body">
                            <!-- Contenido de la tarjeta para el total -->
                            <p class="text-uppercase fw-medium text-truncate mb-3">Total Logs</p>
                            <h4 class="fs-4 flex-grow-1 mb-0">
                                <span class="counter-value" data-target="${totallogs}">
                                    ${totallogs}
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
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        const filterButtons = document.querySelectorAll('.dropdown-menu a[data-filter]');
                        filterButtons.forEach(button => {
                            button.addEventListener('click', function(event) {
                                event.preventDefault();
                                const filter = this.getAttribute('data-filter');
                                updateLogTable(filter);
                            });
                        });

                        function updateLogTable(filter) {
                            const url = `/logs/filter-by-status?filter=${filter}`;
                            fetch(url)
                                .then(response => response.json())
                                .then(data => {
                                    const logs = data.logs;
                                    const tbody = document.querySelector('.table-responsive table > tbody');
                                    tbody.innerHTML = ''; // Clear the table body

                                    // Populate the table with new rows based on the fetched logs
                                    logs.forEach(log => {
                                        const row = document.createElement('tr');
                                        row.innerHTML = `
                        <td class="id">${log.id}</td>
                        <td class="nombre">${log.titulo}</td>
                        <td class="descripcion">${log.observaciones}</td>
                        <td class="fecha_creacion">${log.fecha_finalizacion}</td>
                        <td class="estado">${log.estado_log.nombre}</td>
                        <td class="usuario">${log.glpi_users.name}</td>
                        <td class="action">
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
                                                                       href="<?php echo e(route('logs.show', [$log->id])); ?>"><i
                                                                            class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                                        Vista</a></li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                </ul>
                        </td>
                    `;
                                        tbody.appendChild(row);
                                    });

                                    if(logs.length === 0) {
                                        // Show 'No Results' message or something similar
                                        // ...
                                    }
                                })
                                .catch(error => {
                                    console.error('Error fetching logs:', error);
                                });
                        }
                    });
                </script>

                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        // Asumiendo que este es el botón para "Mi Log"
                        const miLogFilterButton = document.querySelector('.dropdown-menu a[data-filter="TODOS"][data-target="myLogTable"]');

                        miLogFilterButton.addEventListener('click', function(event) {
                            event.preventDefault();
                            // Actualizar la tabla "Mi Log"
                            updateMiLogTable();
                        });
                        function updateMiLogTable() {
                            // Define la URL para filtrar "Mi Log" por el estado "ALL"
                            const url = `/logs/filter-by-status1?filter=TODOS`; // Asegúrate de que esta URL es correcta y apunta al endpoint deseado

                            fetch(url)
                                .then(response => response.json())
                                .then(data => {
                                    // Asume que 'data.logs' contiene los logs filtrados
                                    const logs = data.logs;
                                    // Selecciona el cuerpo de la tabla específica para "Mi Log" usando un selector único
                                    const tbody = document.querySelector('[data-mi-log] table > tbody');

                                    tbody.innerHTML = ''; // Limpia el cuerpo de la tabla

                                    // Itera sobre los logs y los añade a la tabla
                                    logs.forEach(log => {
                                        const row = `
                        <tr>
                            <td class="id">${log.id}</td>
                            <td class="nombre">${log.titulo}</td>
                            <td class="fecha_creacion">${log.fecha_finalizacion}</td>
                            <td class="estado">${log.estado_log.nombre}</td>
                            <td class="usuario">${log.glpi_users.name}</td>
                        </tr>
                    `;
                                        // Añade cada fila nueva al cuerpo de la tabla
                                        tbody.innerHTML += row;
                                    });

                                    if(logs.length === 0) {
                                        // Si no hay logs, podrías mostrar un mensaje o realizar alguna acción
                                        tbody.innerHTML = `<tr><td colspan="5" class="text-center">No hay logs disponibles</td></tr>`;
                                    }
                                })
                                .catch(error => {
                                    console.error('Error fetching logs:', error);
                                });
                        }

                        // Opcional: Llamar inmediatamente a updateMiLogTable para cargar los logs al cargar la página
                        updateMiLogTable();
                    });
                </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\glpi-insumos\resources\views/log/dashboard.blade.php ENDPATH**/ ?>