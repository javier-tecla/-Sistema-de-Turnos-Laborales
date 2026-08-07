<x-app-layout :assets="$assets ?? []">
    <div>
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="profile-img-edit mb-3">
                            @if ($empleado->avatar)
                                <img src="{{ asset('storage/' . $empleado->avatar) }}" alt="Avatar"
                                    class="rounded-circle avatar-130">
                            @else
                                <div
                                    class="rounded-circle avatar-130 bg-soft-primary d-flex align-items-center justify-content-center mx-auto">
                                    <span class="display-4 text-primary fw-bold">
                                        {{ strtoupper(substr($empleado->nombres, 0, 1) . substr($empleado->apellidos, 0, 1)) }}
                                    </span>
                                </div>
                            @endif
                        </div>
                        <h4 class="mb-1">{{ $empleado->nombre_completo }}</h4>
                        <p class="text-muted mb-2">{{ $empleado->profesion ?? 'Sin profesión' }}</p>
                        @if ($empleado->estado === 'activo')
                            <span class="badge bg-success rounded-pill px-3"><i class="bi bi-circle-fill mr-1"
                                    style="font-size: 8px;"></i> Activo</span>
                        @else
                            <span class="badge bg-danger rounded-pill px-3"><i class="bi bi-circle-fill me-1"
                                    style="font-size: 8px;"></i> Inactivo</span>
                        @endif
                        <div class="mt-3">
                            <a href="{{ route('empleados.edit', $empleado->id) }}"
                                class="btn btn-sm btn-success">Editar</a>
                            <a href="{{ route('empleados.index') }}" class="btn btn-sm btn-primary">Volver</a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Cuenta de Usuario</h5>
                    </div>
                    <div class="card-body">
                        @if ($empleado->usuario)
                            <div class="d-flex aling-items-center gap-2 mb-2">
                                <i class="bi bi-envelope text-primary"></i>
                                <span>{{ $empleado->usuario->email }}</span>
                            </div>
                            <div class="d-flex align-itens-center gap-2">
                                <i class="bi bi-shield-check text-primary"></i>
                                <span>{{ $empleado->usuario->getRoleNames()->first() ?? 'Sin rol' }}</span>
                            </div>
                        @else
                            <p class="text-muted mb-0">Sin usuario vinculado</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Información Personal</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-muted mb-1 fw-bold">Nombres</label>
                                <p class="mb-0 fw-medium">{{ $empleado->nombres }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-muted mb-1 fw-bold">Apellidos</label>
                                <p class="mb-0 fw-medium">{{ $empleado->apellidos }}</p>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label text-muted mb-1 fw-bold">Tipo Documento</label>
                                <p class="mb-0 fw-medium">{{ $empleado->tipo_doc }}</p>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label text-muted mb-1 fw-bold">N° Documento</label>
                                <p class="mb-0 fw-medium">{{ $empleado->numero_doc }}</p>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label text-muted mb-1 fw-bold">Género</label>
                                <p class="mb-0 fw-medium">
                                    {{ $empleado->genero === 'M' ? 'Masculino' : ($empleado->genero === 'F' ? 'Femenino' : '-') }}
                                </p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-muted mb-1 fw-bold">Fecha de Nacimiento</label>
                                <p class="mb-0 fw-medium">
                                    {{ $empleado->fecha_nacimiento ? $empleado->fecha_nacimiento->format('d/m/Y') : '-' }}
                                </p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-muted mb-1 fw-bold">Teléfono</label>
                                <p class="mb-0 fw-medium">{{ $empleado->telefono ?? '-' }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-muted mb-1 fw-bold">Dirección</label>
                                <p class="mb-0 fw-medium">{{ $empleado->direccion ?? '-' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Metadatos</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label class="form-label text-muted mb-1 fw-bold">Creado</label>
                                <p class="mb-0 fw-medium">{{ $empleado->created_at->format('d/m/Y H:i') }}</p>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label class="form-label text-muted mb-1 fw-bold">Actualizado</label>
                                <p class="mb-0 fw-medium">{{ $empleado->updated_at->format('d/m/Y H:i') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
