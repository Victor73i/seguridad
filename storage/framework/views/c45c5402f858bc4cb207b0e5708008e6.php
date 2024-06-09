
<?php $__env->startSection('title', $log->titulo); ?>
<?php echo app('translator')->get('translation.overview'); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card mt-n4 mx-n4">
                <div class="bg-soft-warning">
                    <div class="card-body pb-0 px-4">
                        <div class="row mb-3">
                            <div class="col-md">
                                <div class="row align-items-center g-3">
                                    <div class="col-md-auto">
                                        <div class="avatar-md">
                                            <div class="avatar-title bg-white rounded-circle">
                                                <img src="<?php echo e(URL::asset('build/images/empornac.png')); ?>" alt="" class="avatar-xs">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div>
                                            <h4 class="fw-bold"><?php echo e($log->titulo); ?></h4>
                                            <div class="hstack gap-3 flex-wrap">
                                                <div><i class="ri-building-line align-bottom me-1"></i><?php echo e($log->glpi_tickets->id); ?> * <?php echo e($log->glpi_tickets->name); ?></div>
                                                <div class="vr"></div>
                                                <div>Creado : <span class="fw-medium"> <?php echo e($log->created_at->diffForHumans()); ?></span></div>
                                                <div class="vr"></div>
                                                <div>Actualizado : <span class="fw-medium"> <?php echo e($log->updated_at->diffForHumans()); ?></span></div>
                                                <div class="vr"></div>
                                                
                                                <div class="badge rounded-pill bg-danger fs-12"><?php echo e($log->estado_log->nombre); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-auto">
                                <div class="hstack gap-1 flex-wrap">
                                    <button type="button" class="btn py-0 fs-16 favourite-btn active">
                                        <i class="ri-star-fill"></i>
                                    </button>
                                    <button type="button" class="btn py-0 fs-16 text-body">
                                        <i class="ri-share-line"></i>
                                    </button>
                                    <button type="button" class="btn py-0 fs-16 text-body">
                                        <i class="ri-flag-line"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <ul class="nav nav-tabs-custom border-bottom-0" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active fw-semibold" data-bs-toggle="tab" href="#project-overview"
                                   role="tab">
                                    Vista Completa
                                </a>
                            </li>
                            

                        </ul>
                    </div>
                    <!-- end card body -->
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="tab-content text-muted">
                <div class="tab-pane fade show active" id="project-overview" role="tabpanel">
                    <div class="row">
                        <div class="col-xl-9 col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-muted">
                                        <h6 class="mb-3 fw-semibold text-uppercase">Observaciones</h6>
                                        <p><?php echo e($log->observaciones); ?></p>





                                        <div class="pt-3 border-top border-top-dashed mt-4">
                                            <div class="row">

                                                <div class="col-lg-3 col-sm-6">
                                                    <div>
                                                        <p class="mb-2 text-uppercase fw-medium">Fecha Inicio :</p>
                                                        <h5 class="fs-15 mb-0"><?php echo e($log->fecha_inicio); ?></h5>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-sm-6">
                                                    <div>
                                                        <p class="mb-2 text-uppercase fw-medium">Fecha Finalizacion :</p>
                                                        <h5 class="fs-15 mb-0"><?php echo e($log->fecha_finalizacion); ?></h5>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-sm-6">
                                                    <div>
                                                        <p class="mb-2 text-uppercase fw-medium">Estado :</p>
                                                        <div class="badge bg-danger fs-12"><?php echo e($log->estado_log->nombre); ?></div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-sm-6">
                                                    <div>
                                                        <p class="mb-2 text-uppercase fw-medium">Ticket :</p>
                                                        <div class="badge bg-warning fs-12"><?php echo e($log->glpi_tickets->name); ?></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <hr>
                                            <hr>
                                            <hr>
                                        </div><div class="text-muted">
                                        <h6 class="mb-3 fw-semibold text-uppercase">¿Que Quieres Hacer?</h6>
                                            <div class="flex gap-3">
                                                <form method="POST" action="<?php echo e(route('logs.toggle-complete',['log'=>$log])); ?>">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('PUT'); ?>
                                                    <button class="btn btn-soft-primary w-100" id="btn-new-event" type="submit"><i
                                                            class="mdi mdi-plus"></i>  Marcar Como  <?php echo e($log->completado ? 'no completado' : 'completado'); ?></button>

                                                </form>

                                                <a class="btn btn-soft-warning w-100" href="<?php echo e(route('logs.edit', ['log' =>$log->id])); ?>" id="btn-new-event"><i
                                                        class="mdi mdi-plus"></i> Editar</a>

<br><br>
                                                <div>

</div>
                                            </div>
                                        </div>
<hr>
                                        <div class="pt-3 border-top border-top-dashed mt-4">
                                            <h6 class="mb-3 fw-semibold text-uppercase">Archivos</h6>
                                            <div class="row g-3">
                                                <div class="col-xxl-4 col-lg-6">
                                                    <div class="border rounded border-dashed p-2">
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-shrink-0 me-3">
                                                                <div class="avatar-sm">
                                                                    <div
                                                                        class="avatar-title bg-light text-secondary rounded fs-24">
                                                                        <i class="ri-folder-zip-line"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="flex-grow-1 overflow-hidden">
                                                                <?php if($log->archivo): ?>
                                                                    <?php
                                                                        $archivos = explode(',', $log->archivo);
                                                                    ?>

                                                                    <?php $__currentLoopData = $archivos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $archivo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php if(pathinfo($archivo, PATHINFO_EXTENSION) === 'pdf'): ?>
                                                                            <a href="<?php echo e(asset('log/archivo/' . $archivo)); ?>" target="_blank">Ver PDF</a>
                                                                        <?php elseif(in_array(pathinfo($archivo, PATHINFO_EXTENSION), ['png', 'jpg', 'jpeg', 'gif'])): ?>
                                                                            <!-- Utilizamos data-bs-toggle y data-bs-target para activar el modal -->
                                                                            <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#imagenZoomModal" onclick="showImage('<?php echo e(asset('log/archivo/' . $archivo)); ?>')">
                                                                                <img src="<?php echo e(asset('log/archivo/' . $archivo)); ?>" alt="archivo" width="50px" height="50px">
                                                                            </a>
                                                                        <?php else: ?>
                                                                            <a href="<?php echo e(asset('log/archivo/' . $archivo)); ?>" >No hay archivo</a>
                                                                        <?php endif; ?>
                                                                        <br>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <?php endif; ?>

                                                            </div>
                                                            <div class="flex-shrink-0 ms-2">
                                                                <div class="d-flex gap-1">
                                                                    <button type="button"
                                                                            class="btn btn-icon text-muted btn-sm fs-18"><i
                                                                            class="ri-download-2-line"></i></button>
                                                                    <div class="dropdown">

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="card">


                                                            <div class="card-body">

                                                                <div>
<div>
                                                                    </div>

                                                                </div>
                                                                    </div>

                                                </div>
                                                    </div>
                                                </div>
                                                <!-- end col -->

                                                <!-- end col -->
                                            </div>
                                            <!-- end row -->
                                        </div>
                                    </div>
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->

                        </div>
                        <!-- ene col -->
                        <div class="col-xl-3 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title mb-4">Ubicacion</h5>
                                    <div class="d-flex flex-wrap gap-2 fs-16">
                                        <div class="badge fw-medium badge-soft-secondary"><?php echo e($log->glpi_locations->name); ?> * <?php echo e($log->glpi_locations->completename); ?></div>

                                    </div>
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->

                            <div class="card">
                                <div class="card-header align-items-center d-flex border-bottom-dashed">
                                    <h4 class="card-title mb-0 flex-grow-1">Usuario</h4>

                                </div>

                                <div class="card-body">
                                    <div data-simplebar style="height: 235px;" class="mx-n3 px-3">
                                        <div class="vstack gap-3">
                                            <div class="d-flex align-items-center">

                                                <div class="flex-grow-1">
                                                    <h5 class="fs-13 mb-0"><a href="#" class="text-body d-block"><?php echo e($log->glpi_users->firstname); ?> * <?php echo e($log->glpi_users->realname); ?></a></h5>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <div class="d-flex align-items-center gap-1">
                                                        <button type="button" class="btn btn-light btn-sm"><?php echo e($log->glpi_users->name); ?></button>
                                                        <div class="dropdown">
                                                            <button class="btn btn-icon btn-sm fs-16 text-muted dropdown"
                                                                    type="button" data-bs-toggle="dropdown"
                                                                    aria-expanded="false">
                                                                <i class="ri-more-fill"></i>
                                                            </button>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end member item -->

                                        </div>
                                        <!-- end list -->
                                    </div>
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->

                            <div class="card">
                                <div class="card-header align-items-center d-flex border-bottom-dashed">
                                    <h4 class="card-title mb-0 flex-grow-1">EQUIPO IT</h4>

                                </div>

                                <div class="card-body">

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
                                                    <h5 class="fs-13 mb-1">
                                                        <ul>
                                                            <?php $__currentLoopData = $log->equiposIt; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $equipoIt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <li><?php echo e($equipoIt->id); ?>: <?php echo e($equipoIt->nombre); ?></li>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </ul>
                                                    </h5>
                                                </div>

                                            </div>
                                        </div>



                                    </div>

                                    <div class="mt-2 text-center">

                                        <a href="<?php echo e(route('logs.edit', [$log->id])); ?>" type="button" class="btn btn-success">EDITAR</a>
                                    </div>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end tab pane -->

            <!-- end modal-content -->
        </div>

        <!-- modal-dialog -->
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
            // Configura el src de la imagen en el modal
            document.getElementById('imagenZoom').src = src;
            // Puedes agregar aquí más lógica si necesitas
        }
    </script>
    <?php if(isset($debug)): ?>
        echo("<script>console.log('PHP: " . <?php echo e($debug); ?> . "');</script>");
    <?php endif; ?>
    <!-- end modal -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(URL::asset('build/js/pages/project-overview.init.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\glpi-insumos\resources\views/log/show.blade.php ENDPATH**/ ?>