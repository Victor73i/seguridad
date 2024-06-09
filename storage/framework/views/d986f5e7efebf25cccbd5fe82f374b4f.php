
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('Crear Log '); ?>
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
            Crear Log
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <form method="POST" action="<?php echo e(route('documentacions.store')); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre"
                                   class="<?php echo \Illuminate\Support\Arr::toCssClasses(['border-red-500' => $errors->has('nombre')]); ?>"
                                   placeholder="Ingresa el Nombre" value="<?php echo e(old('nombre')); ?>">
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
                            <label class="form-label" for="descripcion">descripcion</label>
                            <textarea class="form-control" name="descripcion" id="ckeditor-classic" placeholder="Ingresa la descripcion"
                            class="<?php echo \Illuminate\Support\Arr::toCssClasses(['border-red-500' => $errors->has('descripcion')]); ?>">
        <?php echo e(old('observaciones')); ?> </textarea>
                            <?php $__errorArgs = ['descripcion'];
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
                            <label for="fecha_creacion" class="form-label">Fecha Creacion</label>
                            <input type="date" name="fecha_creacion" id="fecha_creacion" class="form-control"
                                   class="<?php echo \Illuminate\Support\Arr::toCssClasses(['border-red-500' => $errors->has('fecha_creacion')]); ?>"
                                   value="<?php echo e(old('fecha_creacion')); ?>"/>
                            <?php $__errorArgs = ['fecha_creacion'];
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
                                    <label for="id_glpi_users" class="form-label">Usuario</label>
                                    <select class="form-select" data-choices data-choices-search-false
                                            name="id_glpi_users" id="id_glpi_users"
                                            class="<?php echo \Illuminate\Support\Arr::toCssClasses(['border-red-500' => $errors->has('id_glpi_users')]); ?>"
                                            value="<?php echo e(old('id_glpi_users')); ?>" >
                                        <option value="">Seleccione un Usuario</option>

                                        <?php $__currentLoopData = $id_glpi_users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id_glpi_user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($id_glpi_user->id); ?>"><?php echo e($id_glpi_user->id); ?>: <?php echo e($id_glpi_user->name); ?></option>
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
                            <div class="col-lg-4">
                                <div class="mb-3 mb-lg-0">
                                    <label for="id_estado_documentacion" class="form-label">Estado</label>
                                    <select class="form-select" data-choices data-choices-search-false
                                            name="id_estado_documentacion" id="id_estado_documentacion"
                                            class="<?php echo \Illuminate\Support\Arr::toCssClasses(['border-red-500' => $errors->has('id_estado_documentacion')]); ?>"
                                            value="<?php echo e(old('id_estado_documentacion')); ?>" >
                                        <option value="">Seleccione un Estado</option>

                                        <?php $__currentLoopData = $id_estado_documentacion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id_estado_documentacions): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($id_estado_documentacions->id); ?>"><?php echo e($id_estado_documentacions->id); ?>: <?php echo e($id_estado_documentacions->nombre); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['id_estado_documentacion'];
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
                                    <label for="id_tipo" class="form-label">TIPO</label>
                                    <select class="form-select" data-choices data-choices-search-false
                                            name="id_tipo_documentacion" id="id_tipo_documentacion"
                                            class="<?php echo \Illuminate\Support\Arr::toCssClasses(['border-red-500' => $errors->has('id_tipo_documentacion')]); ?>"
                                            value="<?php echo e(old('id_tipo_documentacion')); ?>" >
                                        <option value="">Seleccione un Tipo</option>

                                        <?php $__currentLoopData = $id_tipo_documentacion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id_tipo_documentacions): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($id_tipo_documentacions->id); ?>"><?php echo e($id_tipo_documentacions->id); ?>: <?php echo e($id_tipo_documentacions->nombre); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['id_tipo_documentacion'];
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
                                    <label for="id_categoria_documentacion" class="form-label">Categoria</label>
                                    <select class="form-select" data-choices data-choices-search-false
                                            name="id_categoria_documentacion" id="id_categoria_documentacion"
                                            class="<?php echo \Illuminate\Support\Arr::toCssClasses(['border-red-500' => $errors->has('id_categoria_documentacion')]); ?>"
                                            value="<?php echo e(old('id_categoria_documentacion')); ?>" >
                                        <option value="">Seleccione una Categoria</option>

                                        <?php $__currentLoopData = $id_categoria_documentacion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id_categoria_documentacions): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($id_categoria_documentacions->id); ?>"><?php echo e($id_categoria_documentacions->id); ?>: <?php echo e($id_categoria_documentacions->nombre); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['id_categoria_documentacion'];
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
                            <div class="mb-3">

                                <!-- Multiple Files Input Example -->
                                <label for="archivo" class="form-label">Archivo</label>
                                <input class="form-control" type="file" name="archivo[]" id="archivo" multiple>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->
                    <div class="text-end mb-4">
                        <button type="submit" class="btn btn-danger w-sm">Delete</button>
                        <button type="submit" class="btn btn-secondary w-sm">Draft</button>
                        <button type="submit" class="btn btn-success w-sm">Create</button>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\glpi-insumos\resources\views/documentacion/create.blade.php ENDPATH**/ ?>