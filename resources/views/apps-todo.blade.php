@extends('layouts.master')
@section('title')
@lang('Documentacion')
@endsection
@section('css')
<link href="{{ URL::asset('build/libs/dragula/dragula.min.css') }}" rel="stylesheet" type="text/css" />

@endsection
@section('content')

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
                <img src="{{URL::asset('build/images/empornac.png')}}" alt="Task" class="img-fluid" />
            </div>
        </div>
    </div>
    <!--end side content-->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Documentacion</h5>
                </div>
                <div class="card-body">
                    <table id="buttons-datatables" class="display table table-bordered" style="width:100%">
                        <thead>
                        <tr>
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
                        @foreach($documentacions as $documentacion)

                            <tr>
                            <td>{{$documentacion->nombre}}</td>
                            <td>{{$documentacion->descripcion}}</td>
                            <td>{{$documentacion->fecha_creacion}}</td>
                            <td>{{$documentacion->archivo}}</td>
                            <td>{{$documentacion->estado_documentacion->nombre}}</td>
                            <td>{{$documentacion->tipo_documentacion->nombre}}</td>
                            <td>{{$documentacion->categoria_documentacion->nombre}}</td>
                            <td>{{$documentacion->glpi_users->name}}</td>

                        </tr>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Start Create Project Modal -->

<!-- End Create Project Modal -->




<!-- Modal -->
<div class="modal fade" id="createTask" tabindex="-1" aria-labelledby="createTaskLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0">
            <div class="modal-header p-3 bg-soft-success">
                <h5 class="modal-title" id="createTaskLabel">Create Task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" id="createTaskBtn-close" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="task-error-msg" class="alert alert-danger py-2"></div>
                <form autocomplete="off" action="" id="creattask-form">
                    <input type="hidden" id="taskid-input" class="form-control">
                    <div class="mb-3">
                        <label for="task-title-input" class="form-label">Task Title</label>
                        <input type="text" id="task-title-input" class="form-control" placeholder="Enter task title">
                    </div>
                    <div class="mb-3 position-relative">
                        <label for="task-assign-input" class="form-label">Assigned To</label>

                        <div class="avatar-group justify-content-center" id="assignee-member"></div>
                        <div class="select-element">
                            <button class="btn btn-light w-100 d-flex justify-content-between" type="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                <span>Assigned To<b id="total-assignee" class="mx-1">0</b>Members</span> <i class="mdi mdi-chevron-down"></i>
                            </button>
                            <div class="dropdown-menu w-100">
                                <div data-simplebar style="max-height: 141px">
                                    <ul class="list-unstyled mb-0">
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                <div class="avatar-xxs flex-shrink-0 me-2">
                                                    <img src="{{URL::asset('build/images/users/avatar-2.jpg')}}" alt="" class="img-fluid rounded-circle" />
                                                </div>
                                                <div class="flex-grow-1">James Forbes</div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                <div class="avatar-xxs flex-shrink-0 me-2">
                                                    <img src="{{URL::asset('build/images/users/avatar-3.jpg')}}" alt="" class="img-fluid rounded-circle" />
                                                </div>
                                                <div class="flex-grow-1">John Robles</div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                <div class="avatar-xxs flex-shrink-0 me-2">
                                                    <img src="{{URL::asset('build/images/users/avatar-4.jpg')}}" alt="" class="img-fluid rounded-circle" />
                                                </div>
                                                <div class="flex-grow-1">Mary Gant</div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                <div class="avatar-xxs flex-shrink-0 me-2">
                                                    <img src="{{URL::asset('build/images/users/avatar-1.jpg')}}" alt="" class="img-fluid rounded-circle" />
                                                </div>
                                                <div class="flex-grow-1">Curtis Saenz</div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                <div class="avatar-xxs flex-shrink-0 me-2">
                                                    <img src="{{URL::asset('build/images/users/avatar-5.jpg')}}" alt="" class="img-fluid rounded-circle" />
                                                </div>
                                                <div class="flex-grow-1">Virgie Price</div>
                                            </a>
                                        </li>

                                        <li>
                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                <div class="avatar-xxs flex-shrink-0 me-2">
                                                    <img src="{{URL::asset('build/images/users/avatar-10.jpg')}}" alt="" class="img-fluid rounded-circle" />
                                                </div>
                                                <div class="flex-grow-1">Anthony Mills</div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                <div class="avatar-xxs flex-shrink-0 me-2">
                                                    <img src="{{URL::asset('build/images/users/avatar-6.jpg')}}" alt="" class="img-fluid rounded-circle" />
                                                </div>
                                                <div class="flex-grow-1">Marian Angel</div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                <div class="avatar-xxs flex-shrink-0 me-2">
                                                    <img src="{{URL::asset('build/images/users/avatar-7.jpg')}}" alt="" class="img-fluid rounded-circle" />
                                                </div>
                                                <div class="flex-grow-1">Johnnie Walton</div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                <div class="avatar-xxs flex-shrink-0 me-2">
                                                    <img src="{{URL::asset('build/images/users/avatar-8.jpg')}}" alt="" class="img-fluid rounded-circle" />
                                                </div>
                                                <div class="flex-grow-1">Donna Weston</div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                <div class="avatar-xxs flex-shrink-0 me-2">
                                                    <img src="{{URL::asset('build/images/users/avatar-9.jpg')}}" alt="" class="img-fluid rounded-circle" />
                                                </div>
                                                <div class="flex-grow-1">Diego Norris</div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-4 mb-3">
                        <div class="col-lg-6">
                            <label for="task-status" class="form-label">Status</label>
                            <select class="form-control" data-choices data-choices-search-false id="task-status-input">
                                <option value="">Status</option>
                                <option value="New" selected>New</option>
                                <option value="Inprogress">Inprogress</option>
                                <option value="Pending">Pending</option>
                                <option value="Completed">Completed</option>
                            </select>
                        </div>
                        <!--end col-->
                        <div class="col-lg-6">
                            <label for="priority-field" class="form-label">Priority</label>
                            <select class="form-control" data-choices data-choices-search-false id="priority-field">
                                <option value="">Priority</option>
                                <option value="High">High</option>
                                <option value="Medium">Medium</option>
                                <option value="Low">Low</option>
                            </select>
                        </div>
                        <!--end col-->
                    </div>
                    <div class="mb-4">
                        <label for="task-duedate-input" class="form-label">Due Date:</label>
                        <input type="date" id="task-duedate-input" class="form-control" placeholder="Due date">
                    </div>

                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-ghost-success" data-bs-dismiss="modal"><i class="ri-close-fill align-bottom"></i> Close</button>
                        <button type="submit" class="btn btn-primary" id="addNewTodo">Add Task</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--end create taks-->

<!-- removeFileItemModal -->
<div id="removeTaskItemModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-removetodomodal"></button>
            </div>
            <div class="modal-body">
                <div class="mt-2 text-center">
                    <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                    <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                        <h4>Are you sure ?</h4>
                        <p class="text-muted mx-4 mb-0">Are you sure you want to remove this task ?</p>
                    </div>
                </div>
                <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                    <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn w-sm btn-danger" id="remove-todoitem">Yes, Delete It!</button>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--end delete modal -->
<div class="modal fade zoomIn" id="createTipoModal" tabindex="-1" aria-labelledby="createEstadoModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header p-3 bg-soft-success">
                <h5 class="modal-title" id="createEstadoModalLabel">Crear Tipo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" id="addProjectBtn-close" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form autocomplete="off" class="needs-validation createProject-form" novalidate>
                    <div class="mb-4">
                        <label for="projectname-input" class="form-label">Project Name</label>
                        <input type="text" class="form-control" id="projectname-input" autocomplete="off" placeholder="Enter project name" required>
                        <div class="invalid-feedback">Please enter a project name</div>
                        <input type="hidden" class="form-control" id="projectid-input" value="" placeholder="Enter project name">
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
<div class="modal fade zoomIn" id="createEstadoModal" tabindex="-1" aria-labelledby="createEstadoModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header p-3 bg-soft-success">
                <h5 class="modal-title" id="createEstadoModalLabel">Crear Estado</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" id="addProjectBtn-close" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form autocomplete="off" class="needs-validation createProject-form" novalidate>
                    <div class="mb-4">
                        <label for="projectname-input" class="form-label">Project Name</label>
                        <input type="text" class="form-control" id="projectname-input" autocomplete="off" placeholder="Enter project name" required>
                        <div class="invalid-feedback">Please enter a project name</div>
                        <input type="hidden" class="form-control" id="projectid-input" value="" placeholder="Enter project name">
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
                <form autocomplete="off" class="needs-validation createProject-form" novalidate>
                    <div class="mb-4">
                        <label for="projectname-input" class="form-label">Project Name</label>
                        <input type="text" class="form-control" id="projectname-input" autocomplete="off" placeholder="Enter project name" required>
                        <div class="invalid-feedback">Please enter a project name</div>
                        <input type="hidden" class="form-control" id="projectid-input" value="" placeholder="Enter project name">
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


@endsection
@section('script')

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

    <script src="{{ URL::asset('build/js/pages/datatables.init.js') }}"></script>

    <script src="{{ URL::asset('build/js/app.js') }}"></script>

    <script src="{{URL::asset('build/libs/dragula/dragula.min.js')}}"></script>
<script src="{{URL::asset('build/libs/dom-autoscroller/dom-autoscroller.min.js')}}"></script>

<script src="{{URL::asset('build/js/pages/todo.init.js')}}"></script>
<script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
