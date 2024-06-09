
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('Tarea'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startSection('css'); ?>
        <!-- jsvectormap css -->
        <link href="<?php echo e(URL::asset('build/libs/jsvectormap/css/jsvectormap.min.css')); ?>" rel="stylesheet" type="text/css" />

        <!-- gridjs css -->
        <link rel="stylesheet" href="<?php echo e(URL::asset('build/libs/gridjs/theme/mermaid.min.css')); ?>">
    <?php $__env->stopSection(); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?> Dashboards <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?> Tarea <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <div class="row project-wrapper">
        <div class="row">
            <div class="col-xl-4">
                <div class="card card-animate overflow-hidden">
                    <div class="position-absolute start-0" style="z-index: 0;">
                        <svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 120" width="200" height="120">
                            <style>
                                .s0 {
                                    opacity: .05;
                                    fill: var(--vz-success)
                                }

                            </style>
                            <path id="Shape 8" class="s0" d="m189.5-25.8c0 0 20.1 46.2-26.7 71.4 0 0-60 15.4-62.3 65.3-2.2 49.8-50.6 59.3-57.8 61.5-7.2 2.3-60.8 0-60.8 0l-11.9-199.4z" />
                        </svg>
                    </div>
                    <div class="card-body" style="z-index:1 ;">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1 overflow-hidden">
                                <p class="text-uppercase fw-medium text-muted text-truncate mb-3"> En Proceso</p>
                                <h4 class="fs-22 fw-semibold ff-secondary mb-0"><span class="counter-value" data-target=""><?php echo e($conteoEnProceso); ?></span></h4>
                            </div>
                            <div class="flex-shrink-0">
                                <div id="total_jobs" data-colors='["--vz-success"]' class="apex-charts" dir="ltr"></div>
                            </div>
                        </div>
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div><!-- end col -->

            <div class="col-xl-4">
                <div class="card card-animate overflow-hidden">
                    <div class="position-absolute start-0" style="z-index: 0;">
                        <svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 120" width="200" height="120">
                            <style>
                                .s0 {
                                    opacity: .05;
                                    fill: var(--vz-success)
                                }

                            </style>
                            <path id="Shape 8" class="s0" d="m189.5-25.8c0 0 20.1 46.2-26.7 71.4 0 0-60 15.4-62.3 65.3-2.2 49.8-50.6 59.3-57.8 61.5-7.2 2.3-60.8 0-60.8 0l-11.9-199.4z" />
                        </svg>
                    </div>
                    <div class="card-body" style="z-index:1 ;">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1 overflow-hidden">
                                <p class="text-uppercase fw-medium text-muted text-truncate mb-3"> En Espera</p>
                                <h4 class="fs-22 fw-semibold ff-secondary mb-0"><span class="counter-value" data-target=""><?php echo e($conteoEnEspera); ?></span></h4>
                            </div>
                            <div class="flex-shrink-0">
                                <div id="total_jobs" data-colors='["--vz-success"]' class="apex-charts" dir="ltr"></div>
                            </div>
                        </div>
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div><!-- end col -->
            <div class="col-xl-4">
                <div class="card card-animate overflow-hidden">
                    <div class="position-absolute start-0" style="z-index: 0;">
                        <svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 120" width="200" height="120">
                            <style>
                                .s0 {
                                    opacity: .05;
                                    fill: var(--vz-success)
                                }

                            </style>
                            <path id="Shape 8" class="s0" d="m189.5-25.8c0 0 20.1 46.2-26.7 71.4 0 0-60 15.4-62.3 65.3-2.2 49.8-50.6 59.3-57.8 61.5-7.2 2.3-60.8 0-60.8 0l-11.9-199.4z" />
                        </svg>
                    </div>
                    <div class="card-body" style="z-index:1 ;">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1 overflow-hidden">
                                <p class="text-uppercase fw-medium text-muted text-truncate mb-3"> Nuevo</p>
                                <h4 class="fs-22 fw-semibold ff-secondary mb-0"><span class="counter-value" data-target=""><?php echo e($conteoNuevo); ?></span></h4>
                            </div>
                            <div class="flex-shrink-0">
                                <div id="total_jobs" data-colors='["--vz-success"]' class="apex-charts" dir="ltr"></div>
                            </div>
                        </div>
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div><!-- end col -->
            <div class="col-xl-4">
                <div class="card card-animate overflow-hidden">
                    <div class="position-absolute start-0" style="z-index: 0;">
                        <svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 120" width="200" height="120">
                            <style>
                                .s0 {
                                    opacity: .05;
                                    fill: var(--vz-success)
                                }

                            </style>
                            <path id="Shape 8" class="s0" d="m189.5-25.8c0 0 20.1 46.2-26.7 71.4 0 0-60 15.4-62.3 65.3-2.2 49.8-50.6 59.3-57.8 61.5-7.2 2.3-60.8 0-60.8 0l-11.9-199.4z" />
                        </svg>
                    </div>
                    <div class="card-body" style="z-index:1 ;">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1 overflow-hidden">
                                <p class="text-uppercase fw-medium text-muted text-truncate mb-3"> Finalizado</p>
                                <h4 class="fs-22 fw-semibold ff-secondary mb-0"><span class="counter-value" data-target=""><?php echo e($conteoFinalizado); ?></span></h4>
                            </div>
                            <div class="flex-shrink-0">
                                <div id="total_jobs" data-colors='["--vz-success"]' class="apex-charts" dir="ltr"></div>
                            </div>
                        </div>
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div><!-- end col -->
            <div class="col-xl-4">
                <div class="card card-animate overflow-hidden">
                    <div class="position-absolute start-0" style="z-index: 0;">
                        <svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 120" width="200" height="120">
                            <style>
                                .s0 {
                                    opacity: .05;
                                    fill: var(--vz-success)
                                }

                            </style>
                            <path id="Shape 8" class="s0" d="m189.5-25.8c0 0 20.1 46.2-26.7 71.4 0 0-60 15.4-62.3 65.3-2.2 49.8-50.6 59.3-57.8 61.5-7.2 2.3-60.8 0-60.8 0l-11.9-199.4z" />
                        </svg>
                    </div>
                    <div class="card-body" style="z-index:1 ;">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1 overflow-hidden">
                                <p class="text-uppercase fw-medium text-muted text-truncate mb-3"> Borrado</p>
                                <h4 class="fs-22 fw-semibold ff-secondary mb-0"><span class="counter-value" data-target=""><?php echo e($conteoBorrado); ?></span></h4>
                            </div>
                            <div class="flex-shrink-0">
                                <div id="total_jobs" data-colors='["--vz-success"]' class="apex-charts" dir="ltr"></div>
                            </div>
                        </div>
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div><!-- end col -->
            <div class="col-xl-4">
                <div class="card card-animate overflow-hidden">
                    <div class="position-absolute start-0" style="z-index: 0;">
                        <svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 120" width="200" height="120">
                            <style>
                                .s0 {
                                    opacity: .05;
                                    fill: var(--vz-success)
                                }

                            </style>
                            <path id="Shape 8" class="s0" d="m189.5-25.8c0 0 20.1 46.2-26.7 71.4 0 0-60 15.4-62.3 65.3-2.2 49.8-50.6 59.3-57.8 61.5-7.2 2.3-60.8 0-60.8 0l-11.9-199.4z" />
                        </svg>
                    </div>
                    <div class="card-body" style="z-index:1 ;">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1 overflow-hidden">
                                <p class="text-uppercase fw-medium text-muted text-truncate mb-3"> Total</p>
                                <h4 class="fs-22 fw-semibold ff-secondary mb-0"><span class="counter-value" data-target=""><?php echo e($totalTarea); ?></span></h4>
                            </div>
                            <div class="flex-shrink-0">
                                <div id="total_jobs" data-colors='["--vz-success"]' class="apex-charts" dir="ltr"></div>
                            </div>
                        </div>
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div><!-- end col -->
        </div>


    <div class="row">
        <div class="col-xl-4">
            <div class="card card-height-100">
                <div class="card-header border-0 align-items-center d-flex justify-content-between">
                    <h4 class="card-title mb-0 flex-grow-1">Tarea</h4>
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
        <div class="col-xl-4">
            <div class="card card-height-100">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Estatus Tarea</h4>

                </div><!-- end card header -->

                <div class="card-body">
                    <div style="display: flex; justify-content: center; align-items: center; height: 400px;">
                        <canvas id="tasks-status-chart" width="400" height="400"></canvas>
                    </div>


                    <div class="mt-3">
                        <div class="d-flex justify-content-center align-items-center mb-4">
                            <div>
                                <p class="text-muted mb-0">Total Tareas</p>
                                <h2 class="me-3 ff-secondary mb-0" id="totalTarea"><?php echo e($totalTarea); ?></h2> <!-- Inicializar con 0 o con el valor del servidor -->


                            </div>

                        </div>

                        <div
                            class="d-flex justify-content-between border-bottom border-bottom-dashed py-2">
                            <h4 class="fs-4 flex-grow-1 mb-0">
                                <p class="fw-medium mb-0">En Proceso</p>
                                <div>
                                    <span class="text-muted pe-5"><?php echo e($conteoEnProceso); ?> Tareas</span>
                                </div>
                            </h4>
                            <h4 class="fs-4 flex-grow-1 mb-0">
                                <p class="fw-medium mb-0">En Espera</p>
                                <div>
                                    <span class="text-muted pe-5"><?php echo e($conteoEnEspera); ?> Tareas</span>
                                </div>
                            </h4>
                            <h4 class="fs-4 flex-grow-1 mb-0">
                                <p class="fw-medium mb-0">Nuevos</p>
                                <div>
                                    <span class="text-muted pe-5"><?php echo e($conteoNuevo); ?> Tareas</span>
                                </div>
                            </h4>
                        </div><!-- end -->

                        <div
                            class="d-flex justify-content-between border-bottom border-bottom-dashed py-2">

                            <h4 class="fs-4 flex-grow-1 mb-0">
                                <p class="fw-medium mb-0">Finalizado</p>
                                <div>
                                    <span class="text-muted pe-5"><?php echo e($conteoFinalizado); ?> Tareas</span>
                                </div>
                            </h4>
                            <h4 class="fs-4 flex-grow-1 mb-0">
                                <p class="fw-medium mb-0">Borrado</p>
                                <div>
                                    <span class="text-muted pe-5"><?php echo e($conteoBorrado); ?> Tareas</span>
                                </div>
                            </h4>
                            <h4 class="fs-4 flex-grow-1 mb-0">
                                <p class="fw-medium mb-0">Total</p>
                                <div>
                                    <span class="text-muted pe-5"><?php echo e($totalTarea); ?> Tareas</span>
                                </div>
                            </h4>
                        </div><!-- end -->




                    </div>
                </div><!-- end cardbody -->
            </div><!-- end card -->
        </div><!-- end col -->
        <div class="col-xxl-4">
            <div class="card">
                <div class="card-header border-0">
                    <h4 class="card-title mb-0">Últimas Tarea</h4>
                </div><!-- end cardheader -->
                <div class="card-body pt-0">
                    <h6 class="text-uppercase fw-semibold mt-4 mb-3 text-muted">Últimos Registros:</h6>
                    <div class="upcoming-scheduled">
                        
                        <?php $__currentLoopData = $ultimosTarea; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tarea): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="d-flex align-items-center mb-4">
                                
                                <div class="flex-shrink-0 avatar-sm">
                        <span class="avatar-title bg-soft-primary text-primary rounded-circle fs-4">
                            
                            <i class="ri-computer-line"></i>
                        </span>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-1"><?php echo e($tarea->nombre); ?></h6>
                                    <p class="text-muted mb-0"><?php echo e($tarea->descripcion); ?> - <?php echo e($tarea->estado); ?></p>
                                </div>
                                <div class="flex-shrink-0">
                                    
                                    <p class="text-muted mb-0"><?php echo e($tarea->fecha_tarea); ?></p>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="mt-3 text-center">
                        <a href="<?php echo e(route('tareas.index')); ?>" class="btn btn-primary">Ver Todas las Tareas</a>
                    </div>
                </div><!-- end cardbody -->
            </div><!-- end card -->
        </div><!-- end col -->

    </div><!-- end row -->

    <div class="row">
        <div class="col-xl-14">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h4 class="card-title flex-grow-1 mb-0">Tarea</h4>
                    <div class="flex-shrink-0">
                        <div class="dropdown card-header-dropdown">
                            <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                <span class="text-muted">Filtrado Por: <i
                                        class="mdi mdi-chevron-down ms-1"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#" data-filter="ALL">ALL</a>
                                <a class="dropdown-item" href="#" data-filter="en espera">En Espera</a>
                                <a class="dropdown-item" href="#" data-filter="terminado">Terminado</a>
                                <a class="dropdown-item" href="#" data-filter="en proceso">En Proceso</a>
                                <a class="dropdown-item" href="#" data-filter="nuevo">Nuevo</a>
                                <a class="dropdown-item" href="#" data-filter="borrado">Borrado</a>
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
                                <th scope="col">Descripcion</th>
                                <th scope="col">Fecha Terminado</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Tickets</th>
                                <th scope="col">Action</th>

                            </tr><!-- end tr -->
                            </thead><!-- thead -->

                            <tbody>
                            <?php $__currentLoopData = $tareas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tarea): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr>


                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>
                        </table><!-- end table -->
                        <div class="pagination-container">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    
                                    <?php if($tareas->onFirstPage()): ?>
                                        <li class="page-item disabled">
                                            <span class="page-link">Anterior</span>
                                        </li>
                                    <?php else: ?>
                                        <li class="page-item">
                                            <a class="page-link" href="<?php echo e($tareas->previousPageUrl()); ?>">Anterior</a>
                                        </li>
                                    <?php endif; ?>

                                    
                                    <?php $__currentLoopData = range(1, $tareas->lastPage()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($i >= $tareas->currentPage() - 2 && $i <= $tareas->currentPage() + 2): ?>
                                            <?php if($i == $tareas->currentPage()): ?>
                                                <li class="page-item active"><span class="page-link"><?php echo e($i); ?></span></li>
                                            <?php else: ?>
                                                <li class="page-item"><a class="page-link" href="<?php echo e($tareas->url($i)); ?>"><?php echo e($i); ?></a></li>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    
                                    <?php if($tareas->hasMorePages()): ?>
                                        <li class="page-item">
                                            <a class="page-link" href="<?php echo e($tareas->nextPageUrl()); ?>">Siguiente</a>
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
                                <th scope="col">Nombre</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col">Fecha Terminado</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Tickets</th>
                            </tr>
                            </thead><!-- end thead -->
                            <tbody>
                            <tr>
                                <?php $__currentLoopData = $tareas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tarea): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <td class="id"><?php echo e($tarea->id); ?></td>


                                    <td class="nombre"><?php echo e($tarea->nombre); ?></td>

                                    <td class="descripcion"><?php echo e($tarea->descripcion); ?></td>
                                    <td class="fecha_creacion"><?php echo e($tarea->fecha_terminado); ?></td>
                                    <td class="descripcion"><?php echo e($tarea->estado); ?></td>
                                    <td class="descripcion"><?php echo e($tarea->glpi_tickets->name); ?></td>
                            </tr><!-- end -->
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody><!-- end tbody -->
                        </table><!-- end table -->

                    </div>
                    <div class="mt-3 text-center">
                        <a href="<?php echo e(route('tareas.index')); ?>" class="text-muted text-decoration-underline">Load
                            More</a>
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
            fetch('/tareas/status')
            .then(response => response.json())
            .then(data => {
            const ctx = document.getElementById('tasks-status-chart').getContext('2d'); // Cambia el ID para que sea único para la gráfica de tareas
            const myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
            labels: ['En Proceso', 'En Espera', 'Nuevo', 'Finalizado', 'Borrado'],
            datasets: [{
            label: 'Estado de las Tareas',
            data: [
            data.en_proceso,
            data.en_espera,
            data.nuevo,
            data.finalizado,
            data.borrado
            ],
            backgroundColor: [
            'rgba(255, 159, 64, 0.2)',
            'rgba(255, 205, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(153, 102, 255, 0.2)'
            ],
            borderColor: [
            'rgba(255, 159, 64, 1)',
            'rgba(255, 205, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(153, 102, 255, 1)'
            ],
            borderWidth: 1
        }]
        },
            options: {
            responsive: true,
            maintainAspectRatio: false,
            // Agrega aquí más opciones de configuración si es necesario
        }
        });

            // Actualiza el total de tareas
            document.getElementById('totalTarea').textContent = Object.values(data).reduce((a, b) => a + b, 0);
        })
            .catch(error => console.error('Error al obtener el estado de las tareas:', error));
    </script>


            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const filterButtons = document.querySelectorAll(".filter-btn");

                    // Establece colores fijos para cada estado.
                    const stateColors = {
                        'nuevo': 'rgba(255, 99, 132, 0.2)',
                        'en proceso': 'rgba(54, 162, 235, 0.2)',
                        'en espera': 'rgba(255, 206, 86, 0.2)',
                        'finalizado': 'rgba(75, 192, 192, 0.2)',
                        'borrado': 'rgba(153, 102, 255, 0.2)'
                    };

                    function drawChart(tareas) {
                        const ctx = document.getElementById('projects-overview-chart').getContext('2d');
                        if (window.projectsOverviewChart instanceof Chart) {
                            window.projectsOverviewChart.destroy();
                        }

                        // Agrupa las tareas por estado y fecha
                        let dataByStateAndDate = tareas.reduce((acc, task) => {
                            const date = `${task.dia}/${task.mes}/${task.año}`;
                            if (!acc[task.estado]) {
                                acc[task.estado] = {};
                            }
                            if (!acc[task.estado][date]) {
                                acc[task.estado][date] = 0;
                            }
                            acc[task.estado][date] += task.cantidad;
                            return acc;
                        }, {});

                        // Crea datasets para cada estado
                        let datasets = Object.keys(dataByStateAndDate).map(state => {
                            return {
                                label: state,
                                data: Object.entries(dataByStateAndDate[state]).map(([date, count]) => {
                                    return { x: date, y: count };
                                }),
                                backgroundColor: stateColors[state],
                                borderColor: stateColors[state].replace('0.2', '1'), // Más oscuro para el borde
                                borderWidth: 1,
                                barThickness: 20,
                            };
                        });

                        window.projectsOverviewChart = new Chart(ctx, {
                            type: 'bar',
                            data: { datasets: datasets },
                            options: {
                                scales: {
                                    x: { stacked: false },
                                    y: {
                                        beginAtZero: true,
                                        stacked: false,
                                        ticks: {
                                            stepSize: 1,
                                            callback: function(value) {
                                                if (value % 1 === 0) { return value; }
                                            },
                                        }
                                    },
                                },
                                plugins: {
                                    legend: { display: true },
                                    tooltip: { enabled: true }
                                }
                            }
                        });
                    }

                    function fetchDataAndGenerateChart(filter) {
                        fetch(`/tareas/status-by-month-and-status?filter=${filter}`)
                            .then(response => response.json())
                            .then(data => {
                                drawChart(data.tareas);
                            })
                            .catch(error => console.error('Error:', error));
                    }

                    filterButtons.forEach(button => {
                        button.addEventListener('click', function() {
                            const filter = this.getAttribute('data-filter');
                            fetchDataAndGenerateChart(filter);
                        });
                    });

                    fetchDataAndGenerateChart('ALL');
                });
            </script>


            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const filterButtons = document.querySelectorAll('.dropdown-menu a[data-filter]');
                    filterButtons.forEach(button => {
                        button.addEventListener('click', function(event) {
                            event.preventDefault();
                            const filter = this.getAttribute('data-filter');
                            updateTareaTable(filter);
                        });
                    });

                    function updateTareaTable(filter) {
                        const url = `/tareas/filter-by-status?filter=${encodeURIComponent(filter)}`;
                        fetch(url)
                            .then(response => response.json())
                            .then(data => {
                                const tareas = data.tareas;
                                const tbody = document.querySelector('.table-responsive table > tbody');
                                tbody.innerHTML = ''; // Clear the table body

                                // Populate the table with new rows based on the fetched tareas
                                tareas.forEach(tarea => {
                                    const row = document.createElement('tr');
                                    row.innerHTML = `
                        <td class="id">${tarea.id}</td>
                        <td class="nombre">${tarea.nombre}</td>
                        <td class="descripcion">${tarea.descripcion}</td>
                        <td class="fecha_terminado">${tarea.fecha_terminado}</td>
                        <td class="estado">${tarea.estado}</td>
                        <td class="tickets"><?php echo e($tarea->glpi_tickets ? $tarea->glpi_tickets->name: ''); ?></td>


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
                                                               href="<?php echo e(route('tareas.show', [$tarea->id])); ?>"><i
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

                                if(tareas.length === 0) {
                                    const noResultRow = document.createElement('tr');
                                    noResultRow.innerHTML = `
                        <td colspan="7" class="text-center">No se encontraron resultados</td>
                    `;
                                    tbody.appendChild(noResultRow);
                                }
                            })
                            .catch(error => {
                                console.error('Error fetching tareas:', error);
                            });
                    }
                    updateTareaTable('ALL');
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\glpi-insumos\resources\views/tarea/dashboard.blade.php ENDPATH**/ ?>