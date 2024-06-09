
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('EQUIPO IT '); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?> Dashboards <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?> EQUIPO IT <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
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
                                        <h4 class="fs-4 flex-grow-1 mb-0"><?php echo e($conteoComputadoras); ?> Equipos</h4>

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
                                        <h4 class="fs-4 flex-grow-1 mb-0"><?php echo e($conteoImpresoras); ?> Equipos</h4>

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
                                        <h4 class="fs-4 flex-grow-1 mb-0"><?php echo e($conteoPdus); ?> Equipos</h4>

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
                                            <span class="text-muted pe-5"><?php echo e($conteoComputadoras); ?> Equipos</span>
                                        </div>
                                    </h4>
                                    <h4 class="fs-4 flex-grow-1 mb-0">
                                        <p class="fw-medium mb-0">IMPRESORAS</p>
                                        <div>
                                            <span class="text-muted pe-5"><?php echo e($conteoImpresoras); ?> Equipos</span>
                                        </div>
                                    </h4>
                                    <h4 class="fs-4 flex-grow-1 mb-0">
                                        <p class="fw-medium mb-0">PDUS</p>
                                        <div>
                                            <span class="text-muted pe-5"><?php echo e($conteoPdus); ?> Equipos</span>
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
                        
                        <?php $__currentLoopData = $ultimosEquiposIt; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $equipoit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="d-flex align-items-center mb-4">
                                
                                <div class="flex-shrink-0 avatar-sm">
                        <span class="avatar-title bg-soft-primary text-primary rounded-circle fs-4">
                            
                            <i class="ri-computer-line"></i>
                        </span>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-1"><?php echo e($equipoit->nombre); ?></h6>
                                    <p class="text-muted mb-0">Tipo: <?php echo e($equipoit->type); ?> - <?php echo e($equipoit->glpiComputers->name ?? $equipoit->glpiPrinters->name ?? $equipoit->glpiPdus->name); ?></p>
                                </div>
                                <div class="flex-shrink-0">
                                    
                                    <p class="text-muted mb-0"><?php echo e($equipoit->created_at->diffForHumans()); ?></p>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="mt-3 text-center">
                        <a href="<?php echo e(route('equipo_its.index')); ?>" class="btn btn-primary">Ver Todos los Equipos IT</a>
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
                            <?php $__currentLoopData = $equiposIt; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $equipoit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr>

                                    <td class="nombre"><?php echo e($equipoit->id); ?></td>


                                    <td class="nombre"><?php echo e($equipoit->nombre); ?></td>

                                    <td class="tipo"><?php echo e($equipoit->type); ?></td>

                                    <?php if($equipoit->glpiComputers): ?>
                                        <td class="equipo"><?php echo e($equipoit->glpiComputers->name); ?></td>
                                    <?php elseif($equipoit->glpiPdus): ?>
                                        <td class="equipo"><?php echo e($equipoit->glpiPdus->name); ?></td>
                                    <?php else: ?>
                                        <td class="equipo"><?php echo e($equipoit->glpiPrinters->name); ?></td>
                                    <?php endif; ?>
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
                                                               href="<?php echo e(route('equipo_its.show', [$equipoit->id])); ?>"><i
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
                                    
                                    <?php if($equiposIt->onFirstPage()): ?>
                                        <li class="page-item disabled">
                                            <span class="page-link">Anterior</span>
                                        </li>
                                    <?php else: ?>
                                        <li class="page-item">
                                            <a class="page-link" href="<?php echo e($equiposIt->previousPageUrl()); ?>">Anterior</a>
                                        </li>
                                    <?php endif; ?>

                                    
                                    <?php $__currentLoopData = range(1, $equiposIt->lastPage()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($i >= $equiposIt->currentPage() - 2 && $i <= $equiposIt->currentPage() + 2): ?>
                                            <?php if($i == $equiposIt->currentPage()): ?>
                                                <li class="page-item active"><span class="page-link"><?php echo e($i); ?></span></li>
                                            <?php else: ?>
                                                <li class="page-item"><a class="page-link" href="<?php echo e($equiposIt->url($i)); ?>"><?php echo e($i); ?></a></li>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    
                                    <?php if($equiposIt->hasMorePages()): ?>
                                        <li class="page-item">
                                            <a class="page-link" href="<?php echo e($equiposIt->nextPageUrl()); ?>">Siguiente</a>
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


    </div><!-- end row -->



    <div class="col-xxl-4 col-lg-6">

    </div><!-- end col -->
    </div><!-- end row -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

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

    <script src="<?php echo e(URL::asset('build/js/pages/dashboard-projects.init.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\glpi-insumos\resources\views/equipo_it/dashboard.blade.php ENDPATH**/ ?>