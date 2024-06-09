
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('Editar Log '); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('build/libs/dropzone/dropzone.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            Log
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            Editar Log
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <form method="POST" action="<?php echo e(route('logs.update', [$log->id])); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="titulo">Titulo</label>
                            <input type="text" class="form-control" id="titulo" name="titulo"
                                   class="<?php echo \Illuminate\Support\Arr::toCssClasses(['border-red-500' => $errors->has('titulo')]); ?>" value="<?php echo e($log->titulo); ?>"
                                   placeholder="Ingresa el Titulo" >
                            <?php $__errorArgs = ['titulo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="error"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>



                        <div class="mb-3">
                            <label class="form-label" for="observaciones">Observaciones</label>
                            <textarea class="form-control" name="observaciones" id="ckeditor-classic" placeholder="Ingresa la Observacion"
                                      class="<?php echo \Illuminate\Support\Arr::toCssClasses(['border-red-500' => $errors->has('observaciones')]); ?>" value="<?php echo e($log->observaciones); ?>">
        <?php echo e($log->observaciones); ?> </textarea>
                            <?php $__errorArgs = ['observaciones'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-danger"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="mb-3">
                            <label for="fecha_inicio">Fecha Inicio</label>
                            <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control"
                                   class="<?php echo \Illuminate\Support\Arr::toCssClasses(['border-red-500' => $errors->has('fecha_inicio')]); ?>"
                                   value="<?php echo e($log->fecha_inicio); ?>"/>
                            <?php $__errorArgs = ['fecha_inicio'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="error"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="mb-4">
                            <label for="fecha_finalizacion">Fecha Finalizacion</label>
                            <input type="date" name="fecha_finalizacion" id="fecha_finalizacion" class="form-control"
                                   class="<?php echo \Illuminate\Support\Arr::toCssClasses(['border-red-500' => $errors->has('fecha_finalizacion')]); ?>"
                                   value="<?php echo e($log->fecha_finalizacion); ?>"/>
                            <?php $__errorArgs = ['fecha_finalizacion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="error"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>


                        <div class="row">
                            <div class="col-lg-4">

                                <div class="mb-3 mb-lg-0">
                                    <label  class="form-label" for="id_estado_log">Estado</label>
                                    <select class="form-select" data-choices data-choices-search-true
                                            name="id_estado_log" id="id_estado_log">

                                        class="<?php echo \Illuminate\Support\Arr::toCssClasses(['border-red-500' => $errors->has('id_estado_log')]); ?>"
                                         >
                                        <?php $__currentLoopData = $id_estado_logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id_estado_log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($id_estado_log->id); ?>" <?php echo e($log->id_estado_log == $id_estado_log->id ? 'selected' : ''); ?>>
                                                <?php echo e($id_estado_log->id); ?>: <?php echo e($id_estado_log->nombre); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['id_estado_log'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <p class="error"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3 mb-lg-0">
                                    <label class="form-label" for="id_glpi_locations">Ubicacion</label>
                                    <select class="form-select" data-choices data-choices-search-false
                                            name="id_glpi_locations" id="id_glpi_locations"
                                            class="<?php echo \Illuminate\Support\Arr::toCssClasses(['border-red-500' => $errors->has('id_glpi_locations')]); ?>"
                                             >

                                        <?php $__currentLoopData = $id_glpi_locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id_glpi_location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($id_glpi_location->id); ?>" <?php echo e($log->id_glpi_locations == $id_glpi_location->id ? 'selected' : ''); ?>><?php echo e($id_glpi_location->id); ?>: <?php echo e($id_glpi_location->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['id_glpi_locations'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <p class="error"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3 mb-lg-0">
                                    <label class="form-label" for="id_glpi_tickets">Ticket</label>
                                    <select class="form-select" data-choices data-choices-search-false
                                            name="id_glpi_tickets" id="id_glpi_tickets"
                                            class="<?php echo \Illuminate\Support\Arr::toCssClasses(['border-red-500' => $errors->has('id_glpi_tickets')]); ?>"
                                             >

                                        <?php $__currentLoopData = $id_glpi_tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id_glpi_ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($id_glpi_ticket->id); ?>" <?php echo e($log->id_glpi_tickets == $id_glpi_ticket->id ? 'selected' : ''); ?>><?php echo e($id_glpi_ticket->id); ?>: <?php echo e($id_glpi_ticket->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['id_glpi_tickets'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <p class="error"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3 mb-lg-0">
                                    <label class="form-label" for="id_glpi_users">Users</label>
                                    <select class="form-select" data-choices data-choices-search-false
                                            name="id_glpi_users" id="id_glpi_users"
                                            class="<?php echo \Illuminate\Support\Arr::toCssClasses(['border-red-500' => $errors->has('id_glpi_users')]); ?>"
                                    >

                                        <?php $__currentLoopData = $id_glpi_users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id_glpi_user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($id_glpi_user->id); ?>" <?php echo e($log->id_glpi_users == $id_glpi_user->id ? 'selected' : ''); ?>><?php echo e($id_glpi_user->id); ?>: <?php echo e($id_glpi_user->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>

                                    <?php $__errorArgs = ['id_glpi_users'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <p class="error"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3 mb-lg-0">
                                    <label class="form-label" for="id_equipo_computo[]">Equipo IT</label>
                                    <select class="form-select" data-choices
                                            name="id_equipo_computo[]" id="multiselect-basic"
                                            class="<?php echo \Illuminate\Support\Arr::toCssClasses(['border-red-500' => $errors->has('id_equipo_computo')]); ?>"
                                            required multiple="multiple" value="<?php echo e($log->id_equipo_computo); ?>">

                                        <?php $__currentLoopData = $equipos_it; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $equipo_it): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($log->equiposIt->contains('id', $equipo_it->id)): ?>
                                                <option value="<?php echo e($equipo_it->id); ?>" selected=""><?php echo e($equipo_it->id); ?>: <?php echo e($equipo_it->nombre); ?></option>
                                            <?php else: ?>
                                                <option value="<?php echo e($equipo_it->id); ?>"><?php echo e($equipo_it->id); ?>: <?php echo e($equipo_it->nombre); ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['id_equipo_computo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <p class="error"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>



                        </div>
                        <hr>

                        <!-- end card body -->
                    </div>
                    <!-- end card -->

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Archivo</h5>
                        </div>
                        <div class="card-body">
                            
                            <?php if(!empty($existingFiles) && count($existingFiles) > 0 && $existingFiles[0] != ''): ?>
                                <ul>
                                    <?php $__currentLoopData = $existingFiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($file != ''): ?> 
                                        <li>
                                            <?php echo e($file); ?> -
                                            <a href="<?php echo e(asset('log/archivo/' . $file)); ?>" target="_blank">Ver</a>
                                            <!-- Botón que dispara el modal -->
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteOrder" data-file="<?php echo e($file); ?>">
                                                Eliminar
                                            </button>
                                        </li>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            <?php else: ?>
                                <p>No hay archivos adjuntos.</p>
                            <?php endif; ?>

                            
                            <div class="mb-3">
                                <label for="archivo" class="form-label">Agregar más archivos</label>
                                <input class="form-control" type="file" name="archivo[]" id="archivo" multiple>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- end card -->
                <div class="text-end mb-4">

                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteOrder1">
                        Eliminar Log
                    </button>
                    <a href="<?php echo e(route('logs.index')); ?>" class="btn btn-secondary w-sm">Cancel</a>
                    <button type="submit" class="btn btn-success w-sm">Editar</button>
                </div>
            </div>
            <!-- end col -->

            <!-- end row -->
        </div>
        </div>

    </form>
    <div class="modal fade flip" id="deleteOrder" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body p-5 text-center">
                    <div class="modal-body p-5 text-center">
                        <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#405189,secondary:#f06548" style="width:90px;height:90px"></lord-icon>
                        <div class="mt-4 text-center">
                            <h4>Estas Seguro de Borrar Esta Tarea ?</h4>
                            <p class="text-muted fs-14 mb-4">Borrar Esta Tarea podra Remover toda esa informacion de la Base de Datos.</p>
                    <div class="hstack gap-2 justify-content-center remove">
                        <button class="btn btn-link btn-ghost-success fw-medium text-decoration-none" data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i> Cerrar</button>
                        <!-- Formulario de eliminación -->
                        <form action="<?php echo e(route('logs.remove-file', ['id' => $log->id])); ?>" method="POST" id="deleteFileForm">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="file_to_remove" id="fileToRemove">
                            <button type="submit" class="btn btn-danger">Confirmar Eliminación</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
            </div>
        </div>
    </div>

    <div class="modal fade flip" id="deleteOrder1" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body p-5 text-center">
                    <div class="modal-body p-5 text-center">
                        <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#405189,secondary:#f06548" style="width:90px;height:90px"></lord-icon>
                        <div class="mt-4 text-center">
                            <h4>Estas Seguro de Borrar Esta Tarea ?</h4>
                            <p class="text-muted fs-14 mb-4">Borrar Esta Tarea podra Remover toda esa informacion de la Base de Datos.</p>
                    <div class="hstack gap-2 justify-content-center remove">
                        <button class="btn btn-link btn-ghost-success fw-medium text-decoration-none" data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i> Cerrar</button>
                        <!-- Formulario de eliminación -->
                        <form action="<?php echo e(route('logs.destroy', $log->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger">Eliminar Log</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var deleteModal = document.getElementById('deleteOrder');
            deleteModal.addEventListener('show.bs.modal', function (event) {
                // Botón que dispara el modal
                var button = event.relatedTarget;
                // Extrae la información del atributo data-file
                var file = button.getAttribute('data-file');
                // Actualiza el formulario con la información del archivo
                var input = deleteModal.querySelector('#fileToRemove');
                input.value = file;
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var element = document.getElementById('multiselect-basic');
            var choices = new Choices(element, {
                removeItemButton: true,
                searchEnabled: true,
                searchChoices: true,
                searchFloor: 1,
                searchResultLimit: 5,
                renderChoiceLimit: -1
            });
        });
    </script>
    <!-- Modal -->

    <!-- end modal -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(URL::asset('build/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/dropzone/dropzone-min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/js/pages/project-create.init.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\glpi-insumos\resources\views/log/edit.blade.php ENDPATH**/ ?>