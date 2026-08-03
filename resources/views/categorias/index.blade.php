<x-app-layout :asset="$assets ?? []">
    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Listado de Categorías</h4>
                        </div>
                        <div class="card-action">
                            <a href="{{ route('categorias.create') }}" class="btn btn-sm btn-primary" role="button">
                                Nueva Categoría
                            </a>
                        </div>
                    </div>
                    <div class="card-body px-0">
                        <div class="table-responsive">
                            <table id="categorias-table" class="table table-striped text-center w-100">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categorias as $categoria)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $categoria->nombre }}</td>
                                            <td>
                                                <div class="d-flex align-items-center justify-content-center gap-2">
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('categorias.edit', $categoria->id) }}">
                                                        Editar
                                                    </a>
                                                    <button type="button" class="btn btn-sm btn-danger btn-delete"
                                                        data-id="{{ $categoria->id }}"
                                                        data-nombre="{{ $categoria->nombre }}">
                                                        Eliminar
                                                    </button>
                                                    <form action="{{ route('categorias.destroy', $categoria->id) }}"
                                                        id="categoria-delete-{{ $categoria->id }}" method="post">
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
                $('#categorias-table').DataTable({
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
                        title: '¿Eliminar categoria?',
                        text: '¿Está seguro de eliminar "' + nombre + '"?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3082d6',
                        confirmButtonText: 'Sí, eliminar',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $('#categoria-delete-' + id).submit();
                        }
                    });
                });
            });
        </script>
    @endpush
</x-app-layout>
