@extends('layouts.master')
@section('title') @lang('Lista Equipo IT ') @endsection
@section('css')
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <style>
        /* Estilo para el contenedor de paginación */
        .pagination-container {
            text-align: center; /* Centra la paginación */
            margin-top: 40px; /* Espacio por encima de la paginación */
            margin-bottom: 20px; /* Espacio por debajo de la paginación */
        }
        .pagination {
            display: flex;
            justify-content: center; /* Centrar los elementos de la paginación */
            padding-left: 0; /* Remover el padding por defecto */
            list-style: none; /* Remover los estilos de lista por defecto */
            border-radius: 0.25rem;
        }

        /* Estilo para los elementos de la paginación */
        .pagination li {
            margin: 0 3px; /* Espacio entre los botones */
        }

        /* Estilo para los enlaces dentro de los elementos de paginación */
        .pagination a {
            color: #007bff; /* Cambia el color del texto según necesites */
            background-color: #fff; /* Color de fondo */
            border: 1px solid #dee2e6; /* Borde */
            padding: 0.5rem 0.75rem; /* Espaciado interno */
        }

        .pagination a:hover {
            text-decoration: none; /* No subrayado al pasar el mouse */
            color: #0056b3; /* Cambia el color del texto al pasar el mouse */
            background-color: #e9ecef; /* Cambia el color de fondo al pasar el mouse */
        }

        .pagination .active a {
            color: #fff; /* Color del texto para página activa */
            background-color: #007bff; /* Color de fondo para página activa */
            border-color: #007bff; /* Color del borde para página activa */
        }
    </style>
@endsection
@section('css')
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') Equipo IT @endslot
        @slot('title') Lista Equipo IT @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center flex-wrap gap-2">

                        <div class="flex-shrink-0">
                            <div class="hstack text-nowrap gap-2">
                                <button class="btn btn-soft-danger" id="remove-actions" onClick="deleteMultiple()"><i class="ri-delete-bin-2-line"></i></button>
                                <button class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#addmembers"><i
                                        class="ri-filter-2-line me-1 align-bottom"></i> Filtrar</button>
                                <button class="btn btn-soft-success">Importar</button>
                                <button type="button" id="dropdownMenuLink1" data-bs-toggle="dropdown"
                                        aria-expanded="false" class="btn btn-soft-info"><i
                                        class="ri-more-2-fill"></i>Action</button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                    <li><a class="dropdown-item" href="#">Todo</a></li>
                                    <li><a class="dropdown-item" href="#">Ultima Semana</a></li>
                                    <li><a class="dropdown-item" href="#">Ultimo Mes</a></li>
                                    <li><a class="dropdown-item" href="#">Ultimo Año</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
        <div class="col-xxl-9">
            <div class="card" id="contactList">
                <div class="card-header">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <div class="search-box">
                                <input type="text" class="form-control search" id="user-search" placeholder="Buscar...">
                                <i class="ri-search-line search-icon"></i>
                            </div>

                        </div>
                        <div class="col-md-auto ms-auto">
                            <div class="d-flex align-items-center gap-2">
                                <span class="text-muted">Filtrar por: </span>
                                <select class="form-control mb-0" id="filter-by-type">
                                    <option value="">Todos</option>
                                    <option value="impresora">Impresora</option>
                                    <option value="pdu">PDU</option>
                                    <option value="computer">Computadora</option>
                                    <!-- Otras opciones de filtrado -->
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div>
                        <div class="table-responsive table-card mb-3">
                            <table class="table align-middle table-nowrap mb-0" id="customerTable">
                                <thead class="table-light">
                                <tr>
                                        <!-- Asegúrate de que el atributo data-id contenga el ID correcto del equipo IT -->
                                    <th scope="col" style="width: 50px;">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                        </div>
                                    </th>
                                    </td>
                                    <th class="sort" data-sort="id" scope="col">ID</th>
                                    <th class="sort" data-sort="nombre" scope="col">Nombre
                                    </th>
                                    <!-- <th class="sort" data-sort="designation" scope="col">Designation
                                    </th> -->
                                    <th class="sort" data-sort="tipo" scope="col">Tipo</th>
                                    <th class="sort" data-sort="equipo" scope="col">Equipo</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody class="list form-check-all">
                                @foreach($equiposIt as $equipoit)

                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input detalle-checkbox" type="checkbox" data-id="{{ $equipoit->id }}">
                                            </div>
                                        </td>
                                        <td class="id">

                                            <div class="d-flex">
                                                <a href="{{route('equipo_its.show', [$equipoit->id])}}" class="flex-grow-1">{{$equipoit->id}}</a>
                                                <div class="flex-shrink-0 ms-4">
                                                    <ul class="list-inline tasks-list-menu mb-0">
                                                        <li class="list-inline-item"><a href="{{route('equipo_its.show', [$equipoit->id])}}"><i class="ri-eye-fill align-bottom me-2 text-muted"></i></a>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="nombre">{{$equipoit->nombre}}</td>

                                        <td class="tipo">{{$equipoit->type}}</td>

                                        @if($equipoit->glpiComputers)
                                            <td class="equipo">{{$equipoit->glpiComputers->name}}</td>
                                        @elseif($equipoit->glpiPdus)
                                            <td class="equipo">{{$equipoit->glpiPdus->name}}</td>
                                        @else
                                            <td class="equipo">{{$equipoit->glpiPrinters->name}}</td>
                                        @endif
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
                                                                   href="javascript:void(0);"><i
                                                                        class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                                    Vista</a></li>
                                                        </ul>
                                                    </div>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>

                            </table>

                            <div class="pagination-container">
                                <ul class="pagination js-pagination">
                                    <!-- Elementos de paginación aquí -->
                                </ul>
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


                    </div>




                </div>
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-xxl-3">
            <div class="card" id="contact-view-detail">
                <div class="card-body text-center">
                    <div class="position-relative d-inline-block">
                        <img src="{{ URL::asset('build/images/empornac.png') }}" alt=""
                             class="avatar-lg rounded-circle img-thumbnail">
                        <span class="contact-active position-absolute rounded-circle bg-success"><span
                                class="visually-hidden"></span>
                    </div>
                    <h5 class="nombre-equipo">Nombre del equipo:</h5>

                </div>
                <div class="card-body">
                    <p class="tipo-equipo">Tipo:</p>

                    <div class="table-responsive table-card">
                        <table class="table table-borderless mb-0">
                            <tbody>
                            <tr>
                                <td class="nombre-equipoit" scope="row">Equipo</td>

                            </tr>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--end card-->
        </div>
        <!--end col-->
    </div>

    <!--end row-->
@endsection
@section('script')
    <script>
        function cargarDetalles(id) {
            fetch(`/equipo_its/detalles/${id}`)
                .then(response => response.json())
                .then(data => {
                    document.querySelector('.nombre-equipo').textContent = 'Nombre del equipo: ' + (data.nombre ?? 'N/A');
                    document.querySelector('.tipo-equipo').textContent = 'Tipo: ' + (data.type ?? 'N/A');
                    document.querySelector('.nombre-equipoit').textContent = 'Nombre Equipo IT: ' + (data.nombre_equipo ?? 'N/A');
                })
                .catch(error => console.error('Error:', error));
        }


        document.addEventListener('DOMContentLoaded', function() {
            // Agrega un evento de cambio a todos los checkboxes de detalles
            document.querySelectorAll('.detalle-checkbox').forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    // Desmarca y deshabilita otros checkboxes
                    document.querySelectorAll('.detalle-checkbox').forEach(function(cb) {
                        if (cb !== checkbox) {
                            cb.checked = false;
                            cb.disabled = checkbox.checked; // Deshabilita si alguno está seleccionado
                        }
                    });

                    // Si el checkbox actual está seleccionado, carga los detalles
                    if (checkbox.checked) {
                        cargarDetalles(checkbox.dataset.id);
                    }
                });
            });

            // Carga automáticamente los detalles del primer equipo IT al cargar la página
            @if($equiposIt->first())
            cargarDetalles({{ $equiposIt->first()->id }});
            // Marca el checkbox correspondiente al primer equipo IT
            document.querySelector('.detalle-checkbox[data-id="{{ $equiposIt->first()->id }}"]').checked = true;
            @endif
        });</script>
   <script>
       document.addEventListener('DOMContentLoaded', function() {
           // Configura List.js con paginación y opciones de búsqueda
           var options = {
               valueNames: ['id', 'nombre', 'tipo', 'equipo'],
               page: 10,
               pagination: [{
                   name: "pagination",
                   paginationClass: "pagination",
                   innerWindow: 1,
                   outerWindow: 1
               }]
           };

           // Inicializa List.js
           var userList = new List('contactList', options);

           document.getElementById('user-search').addEventListener('keyup', function(event) {
               var searchString = event.target.value;
               userList.search(searchString);
           });

           document.getElementById('filter-by-type').addEventListener('change', function(event) {
               var filter = event.target.value;
               userList.filter(function(item) {
                   if (filter === "") {
                       return true;
                   } else {
                       return (item.values().tipo === filter);
                   }
               });
           });

           // Resto del código para cargar detalles...
       });
   </script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/2.3.1/list.min.js"></script>
    <script src="{{ URL::asset('build/js/pages/crm-contact.init.js') }}"></script>
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
