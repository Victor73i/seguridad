
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('Documentacion'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('build/libs/dragula/dragula.min.css')); ?>" rel="stylesheet" type="text/css" />

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="chat-wrapper d-lg-flex gap-1 mx-n4 mt-n4 p-1">

        <div class="file-manager-sidebar">

            <div class="p-4 d-flex flex-column h-100">
                <div class="mb-3">
                    <button class="btn btn-success w-100" data-bs-target="#createEstadoModal" data-bs-toggle="modal"><i class="ri-add-line align-bottom"></i> Agregar Estado</button>
                </div>
                <div class="mb-3">
                    <button class="btn btn-success w-100" data-bs-target="#createTipoModal" data-bs-toggle="modal"><i class="ri-add-line align-bottom"></i> Agregar Tipo</button>
                </div>
                <div class="mb-3">
                    <button class="btn btn-success w-100" data-bs-target="#createCategoriaModal" data-bs-toggle="modal"><i class="ri-add-line align-bottom"></i> Agregar Categoria</button>
                </div>




                <div class="mt-auto text-center">
                    <img src="<?php echo e(URL::asset('build/images/empornac.png')); ?>" alt="Task" class="img-fluid" />
                </div>
            </div>
        </div>
        <!--end side content-->
        <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Documentacion</h5>
                        <hr>
                        <div class="d-flex flex-wrap gap-2">
                            <button class="btn btn-danger add-btn" data-bs-toggle="modal" data-bs-target="#createTask"><i class="ri-add-line align-bottom me-1"></i> Crear Tarea</button>
                            <a href="index" class="btn btn-info add-btn"><i class="ri-add-line align-bottom me-1"></i> Inicio</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">

                        <table id="buttons-datatables" class="display table table-bordered" style="width:100%">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Fecha Creacion</th>
                                <th>Archivo</th>
                                <th>Estado </th>
                                <th>Tipo</th>
                                <th>Categoria</th>
                                <th>Usuario</th>
                                <th>Accion</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $documentacions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $documentacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr>
                                    <td><?php echo e($documentacion->id); ?></td>
                                    <td><?php echo e($documentacion->nombre); ?></td>
                                    <td><?php echo e($documentacion->descripcion); ?></td>
                                    <td><?php echo e($documentacion->fecha_creacion); ?></td>
                                    <td>

                                        <?php if($documentacion->archivo): ?>
                                            <?php
                                                $archivos = explode(',', $documentacion->archivo);
                                            ?>

                                            <?php $__currentLoopData = $archivos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $archivo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(pathinfo($archivo, PATHINFO_EXTENSION) === 'pdf'): ?>
                                                    <a href="<?php echo e(asset('documentacion/archivo/' . $archivo)); ?>" target="_blank">Ver PDF</a>
                                                <?php elseif(in_array(pathinfo($archivo, PATHINFO_EXTENSION), ['png', 'jpg', 'jpeg', 'gif'])): ?>
                                                    <!-- Utilizamos data-bs-toggle y data-bs-target para activar el modal -->
                                                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#imagenZoomModal" onclick="showImage('<?php echo e(asset('documentacion/archivo/' . $archivo)); ?>')">
                                                        <img src="<?php echo e(asset('documentacion/archivo/' . $archivo)); ?>" alt="archivo" width="50px" height="50px">
                                                    </a>
                                                <?php else: ?>
                                                    <a href="<?php echo e(asset('documentacion/archivo/' . $archivo)); ?>" download>Descargar</a>
                                                <?php endif; ?>
                                                <br>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>

                                    </td>
                                    <td><?php echo e($documentacion->estado_documentacion->nombre); ?></td>
                                    <td><?php echo e($documentacion->tipo_documentacion->nombre); ?></td>
                                    <td><?php echo e($documentacion->categoria_documentacion->nombre); ?></td>
                                    <td><?php echo e($documentacion->glpi_users->name); ?></td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton<?php echo e($documentacion->id); ?>" data-bs-toggle="dropdown" aria-expanded="false">
                                                Acciones
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton<?php echo e($documentacion->id); ?>">
                                                <li><a class="dropdown-item" href="<?php echo e(route('documentacions.show', ['documentacion'=>$documentacion->id])); ?>"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> Ver</a></li>
                                                <li><a class="dropdown-item" href="<?php echo e(route('documentacions.edit', [$documentacion->id])); ?>"><i
                                                        class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                    Editar</a>
                                                </li>
                                                <li><hr class="dropdown-divider"></li>
                                                <li>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#removeProjectModal" data-log-id="<?php echo e($documentacion->id); ?>">
                                                        <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Eliminar
                                                    </a>
                                                </li>
                                            </ul>
                                        </div></td>

                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>

    <!-- Start Create Project Modal -->
    <!-- Modal para el zoom de la imagen -->
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
    <!-- End Create Project Modal -->


    <script>
        $(document).ready(function() {
            $('#editModal').on('hidden.bs.modal', function () {
                window.history.pushState({}, document.title, window.location.pathname);
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Limpia la URL después de cerrar el modal de edición
            $('#editModal').on('hidden.bs.modal', function () {
                window.history.pushState({}, document.title, window.location.pathname);
            });

            // Limpia la URL después de cerrar el modal de creación
            $('#showModal').on('hidden.bs.modal', function () {
                window.history.pushState({}, document.title, window.location.pathname);
            });

            // Opcional: Limpia la URL después de una operación de creación exitosa
            // Esto dependerá de cómo manejes la respuesta de la creación
            // Si recargas la página o rediriges al usuario, puedes incluir la lógica aquí
        });
    </script>



    <!-- Modal -->
    <div class="modal fade" id="createTask" tabindex="-1" aria-labelledby="createTaskLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0">
                <div class="modal-header p-3 bg-soft-success">
                    <h5 class="modal-title" id="createTaskLabel">Crear Documentacion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" id="createTaskBtn-close" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="task-error-msg" class="alert alert-danger py-2"></div>
                    <form method="POST" class="tablelist-form" action="<?php echo e(route('documentacions.store')); ?>"  enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" id="taskid-input" class="form-control">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese el Nombre" required
                                   class="<?php echo \Illuminate\Support\Arr::toCssClasses(['border-red-500' => $errors->has('nombre')]); ?>"
                                   value="<?php echo e(old('nombre')); ?>"/>
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
                        <div class="mb-3 position-relative">
                            <label for="descripcion" class="form-label">Descripcion</label>
                            <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Ingrese Descripcion" required
                                   class="<?php echo \Illuminate\Support\Arr::toCssClasses(['border-red-500' => $errors->has('descripcion')]); ?>"
                                   value="<?php echo e(old('descripcion')); ?>"/>
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
                        <div class="row g-4 mb-3">
                            <div class="col-lg-6">
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
                            <!--end col-->
                            <div class="col-lg-6">
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
                            <!--end col-->
                            <div class="col-lg-6">
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
                            <!--end col-->
                            <div class="col-lg-6">
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
                            <!--end col-->
                            <div class="col-lg-6">
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
                            <!--end col-->
                            <div class="mb-3">

                                <!-- Multiple Files Input Example -->
                                    <label for="archivo" class="form-label">Archivo</label>
                                    <input class="form-control" type="file" name="archivo[]" id="archivo" multiple>
                            </div>
                        </div>



                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-ghost-success" data-bs-dismiss="modal"><i class="ri-close-fill align-bottom"></i> Close</button>
                            <button type="submit" class="btn btn-success w-sm">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--end create taks-->
<!-- Modal -->

    <div id="removeProjectModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            id="close-modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mt-2 text-center">
                        <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                   colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                        <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                            <h4>Estas Seguro ?</h4>
                            <p class="text-muted mx-4 mb-0">Estas Seguro que Quieres Eliminar Esta Documentacion ?</p>
                        </div>


                    </div>                <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                        <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Cerrar</button>
                        <!-- Nota: La acción del formulario se establecerá dinámicamente -->
                        <<form action="<?php echo e(route('documentacions.destroy', $documentacion->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn w-sm btn-danger">Si, Borralo!</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <!-- removeFileItemModal -->

    <!--end delete modal -->
    <div class="modal fade zoomIn" id="createTipoModal" tabindex="-1" aria-labelledby="createEstadoModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header p-3 bg-soft-success">
                    <h5 class="modal-title" id="createEstadoModalLabel">Crear Tipo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" id="addProjectBtn-close" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" class="tablelist-form" action="<?php echo e(route('tipo_documentacions.store1')); ?>"  enctype="multipart/form-data">
                       <?php echo csrf_field(); ?>
                        <div class="mb-4">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese Nombre" required
                                   class="<?php echo \Illuminate\Support\Arr::toCssClasses(['border-red-500' => $errors->has('nombre')]); ?>"
                                   value="<?php echo e(old('nombre')); ?>"/>
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
                        <div class="mb-4">
                            <label for="descripcion" class="form-label">Descripcion</label>
                            <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Ingrese Descripcion" required
                                   class="<?php echo \Illuminate\Support\Arr::toCssClasses(['border-red-500' => $errors->has('descripcion')]); ?>"
                                   value="<?php echo e(old('descripcion')); ?>"/>
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
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-ghost-success" data-bs-dismiss="modal"><i class="ri-close-line align-bottom"></i> Close</button>
                            <button type="submit" class="btn btn-primary" id="addNewProject">Agregar Tipo</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end modal-dialog -->
    </div>
    <div class="modal fade zoomIn" id="createEstadoModal" tabindex="-1" aria-labelledby="createEstadoModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header p-3 bg-soft-success">
                    <h5 class="modal-title" id="createEstadoModalLabel">Crear Estado</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" id="addProjectBtn-close" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" class="tablelist-form" action="<?php echo e(route('estado_documentacions.store1')); ?>"  enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="mb-4">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese Nombre" required
                                   class="<?php echo \Illuminate\Support\Arr::toCssClasses(['border-red-500' => $errors->has('nombre')]); ?>"
                                   value="<?php echo e(old('nombre')); ?>"/>
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
                        <div class="mb-4">
                            <label for="descripcion" class="form-label">Descripcion</label>
                            <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Ingrese Descripcion" required
                                   class="<?php echo \Illuminate\Support\Arr::toCssClasses(['border-red-500' => $errors->has('descripcion')]); ?>"
                                   value="<?php echo e(old('descripcion')); ?>"/>
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
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-ghost-success" data-bs-dismiss="modal"><i class="ri-close-line align-bottom"></i> Close</button>
                            <button type="submit" class="btn btn-primary" id="addNewProject">Add Project</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end modal-dialog -->
    </div><div class="modal fade zoomIn" id="createCategoriaModal" tabindex="-1" aria-labelledby="createEstadoModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header p-3 bg-soft-success">
                    <h5 class="modal-title" id="createEstadoModalLabel">Crear Categoria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" id="addProjectBtn-close" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" class="tablelist-form" action="<?php echo e(route('categoria_documentacions.store1')); ?>"  enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="mb-4">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese Nombre" required
                                   class="<?php echo \Illuminate\Support\Arr::toCssClasses(['border-red-500' => $errors->has('nombre')]); ?>"
                                   value="<?php echo e(old('nombre')); ?>"/>
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
                        <div class="mb-4">
                            <label for="descripcion" class="form-label">Descripcion</label>
                            <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Ingrese Descripcion" required
                                   class="<?php echo \Illuminate\Support\Arr::toCssClasses(['border-red-500' => $errors->has('descripcion')]); ?>"
                                   value="<?php echo e(old('descripcion')); ?>"/>
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
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-ghost-success" data-bs-dismiss="modal"><i class="ri-close-line align-bottom"></i> Close</button>
                            <button type="submit" class="btn btn-primary" id="addNewProject">Add Project</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end modal-dialog -->
    </div>
    <script>
        function showImage(src) {
            // Configura el src de la imagen en el modal
            document.getElementById('imagenZoom').src = src;
            // Puedes agregar aquí más lógica si necesitas
        }
    </script>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

    <script src="<?php echo e(URL::asset('build/js/pages/datatables.init.js')); ?>"></script>

    <script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>

    <script src="<?php echo e(URL::asset('build/libs/dragula/dragula.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/dom-autoscroller/dom-autoscroller.min.js')); ?>"></script>

    <script src="<?php echo e(URL::asset('build/js/pages/todo.init.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\glpi-insumos\resources\views/documentacion/index.blade.php ENDPATH**/ ?>