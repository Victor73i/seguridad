
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('Index'); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(URL::asset('build/libs/jsvectormap/css/jsvectormap.min.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(URL::asset('build/libs/swiper/swiper-bundle.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col">

        <div class="h-100">
            <div class="row mb-3 pb-1">
                <div class="col-12">
                    <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                        <div class="flex-grow-1">
                            <h4 class="fs-16 mb-1">Buenos Dias, <?php echo e(Auth::user()->name); ?></h4>
                            <p class="text-muted mb-0">Hola Que Quieres hacer Hoy.</p>
                        </div>
                        <div class="mt-3 mt-lg-0">
                            <form action="javascript:void(0);">
                                <div class="row g-3 mb-0 align-items-center">
                                    <div class="col-sm-auto">

                                    </div>
                                    <!--end col-->
                                    <div class="col-auto">
                                        <a href="<?php echo e(route('tareas.create')); ?>" type="button" class="btn btn-soft-success"><i class="ri-add-circle-line align-middle me-1"></i>
                                            Agregar Tarea</a>
                                    </div>
                                    <div class="col-auto">
                                        <a href="<?php echo e(route('documentacions.create')); ?>" type="button" class="btn btn-soft-success"><i class="ri-add-circle-line align-middle me-1"></i>
                                            Agregar Documentacion</a>
                                    </div>


                                    <div class="col-auto">
                                        <a href="<?php echo e(route('logs.create')); ?>" type="button" class="btn btn-soft-success"><i class="ri-add-circle-line align-middle me-1"></i>
                                            Agregar LOG</a>
                                    </div>
                                    <!--end col-->

                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </form>
                        </div>
                    </div><!-- end card header -->
                </div>
                <!--end col-->
            </div>
            <!--end row-->

            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                        Logs</p>
                                </div>
                                <div class="flex-shrink-0">
                                    <h5 class="text-success fs-14 mb-0">
                                        <i class="ri-arrow-right-up-line fs-13 align-middle"></i>
                                        <?php echo e($totalLog); ?>

                                    </h5>
                                </div>
                            </div>
                            <div class="d-flex align-items-end justify-content-between mt-4">
                                <div>
                                    <h4 class="fs-22 fw-semibold ff-secondary mb-4">                                        <?php echo e($totalLog); ?>


                                    </h4>
                                    <a href="<?php echo e(route('logs.index')); ?>" class="text-decoration-underline">Ver Logs</a>
                                </div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-soft-success rounded fs-3">
                                        <i class="bx bx-dollar-circle text-success"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                        Documentacion</p>
                                </div>
                                <div class="flex-shrink-0">
                                    <h5 class="text-success fs-14 mb-0">
                                        <i class="ri-arrow-right-up-line fs-13 align-middle"></i>
                                        <?php echo e($totalDocumentacion); ?>


                                    </h5>
                                </div>
                            </div>
                            <div class="d-flex align-items-end justify-content-between mt-4">
                                <div>
                                    <h4 class="fs-22 fw-semibold ff-secondary mb-4">                                        <?php echo e($totalDocumentacion); ?>


                                    </h4>
                                    <a href="<?php echo e(route('documentacions.index')); ?>" class="text-decoration-underline">Ver Documentacion</a>
                                </div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-soft-primary rounded fs-3">
                                        <i class="bx bx-wallet text-primary"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                        Tareas</p>
                                </div>
                                <div class="flex-shrink-0">
                                    <h5 class="text-danger fs-14 mb-0">
                                        <i class="ri-arrow-right-up-line fs-13 align-middle"></i>
                                        <?php echo e($totalTarea); ?>

                                    </h5>
                                </div>
                            </div>
                            <div class="d-flex align-items-end justify-content-between mt-4">
                                <div>
                                    <h4 class="fs-22 fw-semibold ff-secondary mb-4"><?php echo e($totalTarea); ?></h4>
                                    <a href="<?php echo e(route('tareas.index')); ?>" class="text-decoration-underline">Ver Tareas</a>
                                </div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-soft-info rounded fs-3">
                                        <i class="bx bx-shopping-bag text-info"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                    <!-- card -->
                    <div class="col-xl-3 col-md-6">
                        <!-- card -->

                    </div>
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                        EQUIPO IT</p>
                                </div>
                                <div class="flex-shrink-0">
                                    <h5 class="text-success fs-14 mb-0">
                                        <i class="ri-arrow-right-up-line fs-13 align-middle"></i>
                                        <?php echo e($totalEquiposIT); ?>

                                    </h5>
                                </div>
                            </div>
                            <div class="d-flex align-items-end justify-content-between mt-4">
                                <div>
                                    <h4 class="fs-22 fw-semibold ff-secondary mb-4"><?php echo e($totalEquiposIT); ?>

                                    </h4>
                                    <a href="<?php echo e(route('equipo_its.index')); ?>" class="text-decoration-underline">Ver Equipo IT</a>
                                </div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-soft-warning rounded fs-3">
                                        <i class="bx bx-user-circle text-warning"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->




            </div> <!-- end row-->

        <div class="row">
            <div class="col-xl-3 col-md-6">
                <!-- card -->
                <div class="card card-animate">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1 overflow-hidden">
                                <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                    GRUPO NO. 1</p>
                            </div>
                            <div class="flex-shrink-0">
                                    <p class="text-muted mb-0">Ricardo Antonio Oliva Guerra</p>
                                    <p class="text-muted mb-0">Erick Guillermo Mejia Flores</p>
                                    <p class="text-muted mb-0">Victor Alexander De Leon Contreras</p>
                                    <p class="text-muted mb-0">Carlos Daniel Ramirez Espinoza</p>
                                    <p class="text-muted mb-0">Diego Alejandro Catalan Portillo</p>                                </h5>
                            </div>
                        </div>

                    </div><!-- end card body -->
                </div><!-- end card -->
                <!-- card -->


            </div><!-- end col -->



        </div>

            <div class="row">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Log</h4>
                            <div class="flex-shrink-0">
                                <div class="dropdown card-header-dropdown">
                                    <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="fw-semibold text-uppercase fs-12">Sort by:
                                        </span><span class="text-muted">Today<i class="mdi mdi-chevron-down ms-1"></i></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Today</a>
                                        <a class="dropdown-item" href="#">Yesterday</a>
                                        <a class="dropdown-item" href="#">Last 7 Days</a>
                                        <a class="dropdown-item" href="#">Last 30 Days</a>
                                        <a class="dropdown-item" href="#">This Month</a>
                                        <a class="dropdown-item" href="#">Last Month</a>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="table-responsive table-card">
                                <table class="table table-hover table-centered align-middle table-nowrap mb-0">
                                    <thead class="text-muted table-light">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Usuario</th>
                                        <th scope="col">Titulo</th>
                                        <th scope="col">Observaciones</th>
                                        <th scope="col">Fecha Inicio</th>
                                        <th scope="col">Ubicacion</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <tr>
                                            <td>
                                                <a href="<?php echo e(route('logs.show', $log1->id)); ?>" class="fw-medium link-primary"><?php echo e($log1->id); ?></a>

                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 me-2">
                                                        <img src="<?php echo e(URL::asset('build/images/users/avatar-tecnico.jpg')); ?>" alt="" class="avatar-xs rounded-circle" />
                                                    </div>
                                                    <div class="flex-grow-1"><?php echo e($log1->glpi_users->name); ?></div>
                                                </div>
                                            </td>
                                            <td><?php echo e($log1->titulo); ?></td>
                                            <td>
                                                <span class="text-success"><?php echo e($log1->observaciones); ?></span>
                                            </td>
                                            <td><?php echo e($log1->fecha_inicio); ?></td>
                                            <td>
                                                <span class="badge badge-soft-success"><?php echo e($log1->glpi_locations->name); ?></span>
                                            </td>

                                        </tr><!-- end tr -->

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>


                            <div class="align-items-center mt-4 pt-2 justify-content-between row text-center text-sm-start">
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
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="card card-height-100">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Documentacion</h4>
                            <div class="flex-shrink-0">
                                <div class="dropdown card-header-dropdown">
                                    <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="text-muted">Report<i class="mdi mdi-chevron-down ms-1"></i></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Download Report</a>
                                        <a class="dropdown-item" href="#">Export</a>
                                        <a class="dropdown-item" href="#">Import</a>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="table-responsive table-card">
                                <table class="table table-centered table-hover align-middle table-nowrap mb-0">
                                    <thead class="text-muted table-light">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Usuario</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Descripcion</th>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Tipo</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $documentacions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $documentacion1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <tr>
                                            <td>
                                                <a href="<?php echo e(route('documentacions.show', $documentacion1->id)); ?>" class="fw-medium link-primary"><?php echo e($documentacion1->id); ?></a>

                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 me-2">
                                                        <img src="<?php echo e(URL::asset('build/images/users/avatar-tecnico.jpg')); ?>" alt="" class="avatar-xs rounded-circle" />
                                                    </div>
                                                    <div class="flex-grow-1"><?php echo e($documentacion1->glpi_users->name); ?></div>
                                                </div>
                                            </td>
                                            <td><?php echo e($documentacion1->nombre); ?></td>
                                            <td>
                                                <span class="text-success"><?php echo e($documentacion1->descripcion); ?></span>
                                            </td>
                                            <td><?php echo e($documentacion1->fecha_creacion); ?></td>
                                            <td>
                                                <span class="badge badge-soft-success"><?php echo e($documentacion1->estado_documentacion->nombre); ?></span>
                                            </td>
                                            <td>
                                                <h5 class="fs-14 fw-medium mb-0"><?php echo e($documentacion1->tipo_documentacion->nombre); ?>

                                            </td>
                                        </tr><!-- end tr -->

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table><!-- end table -->

                                </div>

                            </div>
                        <div class="align-items-center mt-4 pt-2 justify-content-between row text-center text-sm-start">

                        <div class="pagination-container">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    
                                    <?php if($documentacions->onFirstPage()): ?>
                                        <li class="page-item disabled">
                                            <span class="page-link">Anterior</span>
                                        </li>
                                    <?php else: ?>
                                        <li class="page-item">
                                            <a class="page-link" href="<?php echo e($documentacions->previousPageUrl()); ?>">Anterior</a>
                                        </li>
                                    <?php endif; ?>

                                    
                                    <?php $__currentLoopData = range(1, $documentacions->lastPage()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($i >= $documentacions->currentPage() - 2 && $i <= $documentacions->currentPage() + 2): ?>
                                            <?php if($i == $documentacions->currentPage()): ?>
                                                <li class="page-item active"><span class="page-link"><?php echo e($i); ?></span></li>
                                            <?php else: ?>
                                                <li class="page-item"><a class="page-link" href="<?php echo e($documentacions->url($i)); ?>"><?php echo e($i); ?></a></li>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    
                                    <?php if($documentacions->hasMorePages()): ?>
                                        <li class="page-item">
                                            <a class="page-link" href="<?php echo e($documentacions->nextPageUrl()); ?>">Siguiente</a>
                                        </li>
                                    <?php else: ?>
                                        <li class="page-item disabled">
                                            <span class="page-link">Siguiente</span>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </nav>
                        </div>
                        </div> <!-- .card-body-->
                    </div> <!-- .card-->
                </div> <!-- .col-->
            </div> <!-- end row-->

            <div class="row">


                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Tareas Nuevas</h4>
                            <div class="flex-shrink-0">
                                <a type="button" class="btn btn-soft-info btn-sm" href="<?php echo e(route('tareas.create')); ?>">
                                    <i class="ri-file-list-3-line align-middle"></i> Generar Tarea
                                </a>
                            </div>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="table-responsive table-card">
                                <table class="table table-borderless table-centered align-middle table-nowrap mb-0">
                                    <thead class="text-muted table-light">
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Tecnico</th>
                                            <th scope="col">Tarea</th>
                                            <th scope="col">Descripcion</th>
                                            <th scope="col">Fecha Por Terminar</th>
                                            <th scope="col">Observacion</th>
                                            <th scope="col">Ticket</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $tareas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tarea1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <tr>
                                            <td>
                                                <a href="<?php echo e(route('tareas.show', $tarea1->id)); ?>" class="fw-medium link-primary"><?php echo e($tarea1->id); ?></a>

                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 me-2">
                                                        <img src="<?php echo e(URL::asset('build/images/users/avatar-tecnico.jpg')); ?>" alt="" class="avatar-xs rounded-circle" />
                                                    </div>
                                                    <div class="flex-grow-1"><?php echo e($tarea1->glpi_users->name); ?></div>
                                                </div>
                                            </td>
                                            <td><?php echo e($tarea1->nombre); ?></td>
                                            <td>
                                                <span class="text-success"><?php echo e($tarea1->descripcion); ?></span>
                                            </td>
                                            <td><?php echo e($tarea1->fecha_aproximada); ?></td>
                                            <td>
                                                <span class="badge badge-soft-success"><?php echo e($tarea1->observacion); ?></span>
                                            </td>
                                            <td>
                                                <h5 class="fs-14 fw-medium mb-0"><?php echo e($tarea1->glpi_tickets->name); ?>

                                            </td>
                                        </tr><!-- end tr -->

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </tbody><!-- end tbody -->
                                </table><!-- end table -->


                                </div> <!-- .card-body-->

                            </div>
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

                    </div> <!-- .card-->


                </div> <!-- .col-->

            </div> <!-- end row-->

        </div> <!-- end .h-100-->

    </div> <!-- end col -->


</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<!-- apexcharts -->
<script src="<?php echo e(URL::asset('build/libs/apexcharts/apexcharts.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/libs/jsvectormap/js/jsvectormap.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/libs/jsvectormap/maps/world-merc.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/libs/swiper/swiper-bundle.min.js')); ?>"></script>
<!-- dashboard init -->
<script src="<?php echo e(URL::asset('build/js/pages/dashboard-ecommerce.init.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\glpi-insumos\resources\views/index.blade.php ENDPATH**/ ?>