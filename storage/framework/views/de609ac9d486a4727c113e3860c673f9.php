
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('Editar Tarea '); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('build/libs/dropzone/dropzone.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            Tarea
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            EDITAR Tarea
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <form method="POST" action="<?php echo e(route('tareas.update', [$tarea->id])); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="col-lg-4">
                                <div class="mb-3 mb-lg-0">
                                    <label for="id_glpi_users" class="form-label">TECNICO ASIGNADO</label>
                                    <select class="form-select" data-choices data-choices-search-false
                                            name="id_glpi_users" id="id_glpi_users"
                                        class="<?php echo \Illuminate\Support\Arr::toCssClasses(['border-red-500' => $errors->has('id_glpi_users')]); ?>">

                                        <?php $__currentLoopData = $id_glpi_users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id_glpi_user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($id_glpi_user->id); ?>" <?php echo e($tarea->id_glpi_users == $id_glpi_user->id ? 'selected' : ''); ?>>
                                                <?php echo e($id_glpi_user->id); ?>: <?php echo e($id_glpi_user->name); ?>

                                            </option>
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



                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese el Nombre" required
                                   class="<?php echo \Illuminate\Support\Arr::toCssClasses(['border-red-500' => $errors->has('nombre')]); ?>"
                                   value="<?php echo e($tarea->nombre); ?>"/>
                            <?php $__errorArgs = ['nombre'];
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
                            <label for="descripcion" class="form-label">Descripcion</label>
                            <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Ingrese Descripcion" required
                                   class="<?php echo \Illuminate\Support\Arr::toCssClasses(['border-red-500' => $errors->has('descripcion')]); ?>"
                                   value="<?php echo e($tarea->descripcion); ?>"/>
                            <?php $__errorArgs = ['descripcion'];
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
                            <label for="fecha_asignacion" class="form-label">Fecha Asignacion</label>
                            <input type="date" name="fecha_asignacion" id="fecha_asignacion" class="form-control"
                                   class="<?php echo \Illuminate\Support\Arr::toCssClasses(['border-red-500' => $errors->has('fecha_asignacion')]); ?>"
                                   value="<?php echo e($tarea->fecha_asignacion); ?>"/>
                            <?php $__errorArgs = ['fecha_asignacion'];
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
                                    <label for="fecha_aproximada" class="form-label">Fecha Aproximada</label>
                                    <input type="date" name="fecha_aproximada" id="fecha_aproximada" class="form-control"
                                           class="<?php echo \Illuminate\Support\Arr::toCssClasses(['border-red-500' => $errors->has('fecha_aproximada')]); ?>"
                                           value="<?php echo e($tarea->fecha_aproximada); ?>"/>
                                    <?php $__errorArgs = ['fecha_aproximada'];
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
                                    <label for="fecha_terminado" class="form-label">Fecha Terminado</label>
                                    <input type="date" name="fecha_terminado" id="fecha_terminado" class="form-control"
                                           class="<?php echo \Illuminate\Support\Arr::toCssClasses(['border-red-500' => $errors->has('fecha_terminado')]); ?>"
                                           value="<?php echo e($tarea->fecha_terminado); ?>"/>
                                    <?php $__errorArgs = ['fecha_terminado'];
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
                                    <label for="estado" class="form-label">Estado</label>
                                    <select required name="estado" class="form-control" data-choices data-choices-search-false id="estado">
                                        <option value="nuevo" <?php echo e($tarea->estado == 'nuevo' ? 'selected' : ''); ?>>nuevo</option>
                                        <option value="en espera" <?php echo e($tarea->estado == 'en espera' ? 'selected' : ''); ?>>en espera</option>
                                        <option value="en proceso" <?php echo e($tarea->estado == 'en proceso' ? 'selected' : ''); ?>>en proceso</option>
                                        <option value="terminado" <?php echo e($tarea->estado == 'terminado' ? 'selected' : ''); ?>>terminado</option>
                                        <option value="borrado" <?php echo e($tarea->estado == 'borrado' ? 'selected' : ''); ?>>borrado</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3 mb-lg-0">
                                    <label for="prioridad" class="form-label">Prioridad</label>
                                    <select required name="prioridad" class="form-control" data-choices data-choices-search-false id="prioridad">
                                        <option value="">Seleccione la prioridad</option>
                                        <option value="baja" <?php echo e($tarea->prioridad == 'baja' ? 'selected' : ''); ?>>Baja</option>
                                        <option value="media" <?php echo e($tarea->prioridad == 'media' ? 'selected' : ''); ?>>Media</option>
                                        <option value="alta" <?php echo e($tarea->prioridad == 'alta' ? 'selected' : ''); ?>>Alta</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label for="observacion" class="form-label">Observacion</label>
                                <input type="text" name="observacion" id="observacion" class="form-control" placeholder="Ingrese Observacion" required
                                       class="<?php echo \Illuminate\Support\Arr::toCssClasses(['border-red-500' => $errors->has('observacion')]); ?>"
                                       value="<?php echo e($tarea->observacion); ?>"/>
                                <?php $__errorArgs = ['observacion'];
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
                            <!--end col-->
                            <div class="col-lg-12">

                                <label for="id_glpi_tickets" class="form-label">Ticket</label>
                                <select class="form-select" data-choices data-choices-search-false
                                        name="id_glpi_tickets" id="id_glpi_tickets"
                                    class="<?php echo \Illuminate\Support\Arr::toCssClasses(['border-red-500' => $errors->has('id_glpi_tickets')]); ?>">

                                    <?php $__currentLoopData = $id_glpi_tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id_glpi_ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($id_glpi_ticket->id); ?>" <?php echo e($tarea->id_glpi_tickets == $id_glpi_ticket->id ? 'selected' : ''); ?>>
                                            <?php echo e($id_glpi_ticket->id); ?>: <?php echo e($id_glpi_ticket->name); ?>

                                        </option>
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
                        <hr>

                        <!-- end card body -->
                    </div>
                    <!-- end card -->


                </div>
                <!-- end card -->
                <div class="text-end mb-4">
                    <button href="#" class="btn btn-danger w-sm">Delete</button>
                    <a href="<?php echo e(route('tareas.index')); ?>" class="btn btn-secondary w-sm">Cancel</a>
                    <button type="submit" class="btn btn-success w-sm">Editar</button>
                </div>
            </div>
            <!-- end col -->

            <!-- end row -->
        </div>
        </div>
    </form>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\glpi-insumos\resources\views/tarea/edit.blade.php ENDPATH**/ ?>