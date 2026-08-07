<x-app-layout :asset="$assets ?? []">
    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Listado de Empleados</h4>
                        </div>
                        <div class="card-action">
                            <a href="{{ route('empleados.create') }}" class="btn btn-sm btn-primary" role="button">
                                Nuevo Empleado
                            </a>
                        </div>
                    </div>
                    <div class="card-body px-0">
                        <div class="table-responsive">
                            <table id="empleados-table" class="table table-striped text-center w-100">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre Completo</th>
                                        <th>Documento</th>
                                        <th>Teléfono</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($empleados as $empleado)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $empleado->nombre_completo }}</td>
                                            <td>{{ $empleado->tipo_doc }}: {{ $empleado->numero_doc }}</td>
                                            <td>{{ $empleado->telefono ?? '-' }}</td>
                                            <td>
                                                @if ($empleado->estado === 'activo')
                                                    <span class="badge bg-success">Activo</span>
                                                @else
                                                    <span class="badge bg-success">Inactivo</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center justify-content-center gap-2">
                                                    <a class="btn btn-sm btn-info"
                                                        href="{{ route('empleados.show', $empleado->id) }}">
                                                        Ver
                                                    </a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('empleados.edit', $empleado->id) }}">
                                                        Editar
                                                    </a>
                                                    <button type="button" class="btn btn-sm btn-danger btn-delete"
                                                        data-id="{{ $empleado->id }}"
                                                        data-nombre="{{ $empleado->nombre_completo }}">
                                                        Eliminar
                                                    </button>
                                                    <form action="{{ route('empleados.destroy', $empleado->id) }}"
                                                        id="empleado-delete-{{ $empleado->id }}" method="post">
                                                        @method('delete')
                                                        @csrf()
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#empleados-table').DataTable({
                    language: {
                        processing: "Procesando...",
                        search: "Buscar:",
                        lengthMenu: "Mostrar _MENU_ registros",
                        info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
                        infoEmpty: "Mostrando 0 a 0 de 0 registros",
                        infoFiltered: "(filtrado de _MAX_ registros totales)",
                        loadingRecords: "Cargando...",
                        zeroRecords: "No se encontraron resultados",
                        emptyTable: "No hay datos disponibles en la tabla",
                        paginate: {
                            first: "Primero",
                            previous: "Anterior",
                            next: "Siguiente",
                            last: "Último"
                        },
                        aria: {
                            sortAscending: ": activar para ordenar ascendente",
                            sortDescending: ": activar para ordenar descendente"
                        }
                    },
                    order: [
                        [0, 'asc']
                    ],
                    columnDefs: [{
                        orderable: false,
                        targets: 2
                    }]
                });

                $(document).on('click', '.btn-delete', function() {
                    var id = $(this).data('id');
                    var nombre = $(this).data('nombre');
                    Swal.fire({
                        title: '¿Eliminar empleado?',
                        text: '¿Está seguro de eliminar "' + nombre + '"?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3082d6',
                        confirmButtonText: 'Sí, eliminar',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $('#empleado-delete-' + id).submit();
                        }
                    });
                });
            });
        </script>
    @endpush
</x-app-layout>
