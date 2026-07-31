<x-app-layout :assets="$assets ?? []">
    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Listado de Sucursales</h4>
                        </div>
                        <div class="card-action">
                            <a href="{{ route('sucursales.create') }}" class="btn btn-sm btn-primary" role="button">
                                Nueva Sucursal
                            </a>
                        </div>
                    </div>
                    <div class="card-body px-0">
                        <div class="table-responsive">
                            <table id="sucursales-table" class="table table-striped text-center w-100">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Dirección</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($sucursales as $sucursal)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $sucursal->nombre }}</td>
                                            <td>{{ $sucursal->direccion ?? '-' }}</td>
                                            <td>
                                                <div class="d-flex align-items-center justify-content-center gap-2">
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('sucursales.edit', $sucursal->id) }}">
                                                        Editar
                                                    </a>
                                                    <button type="button" class="btn btn-sm btn-danger btn-delete"
                                                        data-id="{{ $sucursal->id }}"
                                                        data-nombre="{{ $sucursal->nombre }}">
                                                        Eliminar
                                                    </button>
                                                    <form action="{{ route('sucursales.destroy', $sucursal->id) }}"
                                                        id="sucursal-delete-{{ $sucursal->id }}" method="post">
                                                        @method('delete')
                                                        @csrf()
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center py-4">
                                                No hay sucursales registradas.
                                            </td>
                                        </tr>
                                    @endforelse
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
                $('#sucursales-table').DataTable({
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
                        ordenable: false,
                        targets: 3
                    }]
                });

                $(document).on('click', '.btn-delete', function() {
                    var id = $(this).data('id');
                    var nombre = $(this).data('nombre');
                    Swal.fire({
                        title: '¿Eliminar sucursal?',
                        text: '¿Está seguro de eliminar "' + nombre + '"?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3082d6',
                        confirmButtonText: 'Sí, eliminar',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $('#sucursal-delete-' + id).submit();
                        }
                    });
                });
            });
        </script>
    @endpush
</x-app-layout>
