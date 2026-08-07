<x-app-layout :assets="$assets ?? []">
    <div>
        <form action="{{ route('empleados.update', $empleado->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Editar Empleado</h4>
                            </div>
                            <div class="card-action">
                                <a href="{{ route('empleados.index') }}" class="btn btn-sm btn-primary"
                                    role="button">Volver</a>
                            </div>
                        </div>
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="row">
                                <div class="form-group col-6">
                                    <label class="form-label" for="nombre">Nombres: <sup
                                            class="text-danger">(*)</sup></label>
                                    <input type="text" name="nombres" id="nombres" class="form-control"
                                        placeholder="Nombres" value="{{ old('nombres', $empleado->nombres) }}" required>
                                    @error('nombres')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label class="form-label" for="nombre">Apellidos: <sup
                                            class="text-danger">(*)</sup></label>
                                    <input type="text" name="apellidos" id="apellidos" class="form-control"
                                        placeholder="Apellidos" value="{{ old('apellidos', $empleado->apellidos) }}"
                                        required>
                                    @error('apellidos')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-3">
                                    <label class="form-label" for="tipo_doc">Tipo Documento: <sup
                                            class="text-danger">(*)</sup></label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-card-list"></i></span>
                                        <select name="tipo_doc" id="tipo_doc"
                                            class="form-control @error('tipo_doc') is-invalid @enderror" required>
                                            <option value="">Seleccione...</option>
                                            <option
                                                value="CI"{{ old('tipo_doc', $empleado->tipo_doc) === 'CI' ? 'selected' : '' }}>
                                                CI
                                            </option>
                                            <option
                                                value="DNI"{{ old('tipo_doc', $empleado->tipo_doc) === 'DNI' ? 'selected' : '' }}>
                                                DNI
                                            </option>
                                            <option
                                                value="RUC"{{ old('tipo_doc', $empleado->tipo_doc) === 'RUC' ? 'selected' : '' }}>
                                                RUC
                                            </option>
                                            <option
                                                value="PASAPORTE"{{ old('tipo_doc', $empleado->tipo_doc) === 'PASAPORTE' ? 'selected' : '' }}>
                                                PASAPORTE</option>
                                            <option
                                                value="OTRO"{{ old('tipo_doc', $empleado->tipo_doc) === 'OTRO' ? 'selected' : '' }}>
                                                OTRO</option>
                                        </select>
                                        @error('tipo_doc')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-3">
                                    <label class="form-label" for="numero_doc">Número Documento: <sup
                                            class="text-danger">(*)</sup></label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-credit-card-2-front"></i></span>
                                        <input type="text" name="numero_doc" id="numero_doc"
                                            class="form-control @error('numero_doc') is-invalid @enderror"
                                            placeholder="Número de documento"
                                            value="{{ old('numero_doc', $empleado->numero_doc) }}" required>
                                        @error('numero_doc')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-3">
                                    <label class="form-label" for="telefono">Teléfono: </label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                                        <input type="text" name="telefono" id="telefono"
                                            class="form-control @error('telefono') is-invalid @enderror"
                                            placeholder="Teléfono" value="{{ old('telefono', $empleado->telefono) }}"
                                            required>
                                        @error('telefono')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-3">
                                    <label class="form-label" for="email">Correo Electrónico: </label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                        <input type="email" name="email" id="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            placeholder="Correo electrónico"
                                            value="{{ old('email', $empleado->usuario->email ?? '') }}" required>
                                        @error('email')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label class="form-label" for="profesion">Profesión: </label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-briefcase"></i></span>
                                        <input type="text" name="profesion" id="profesion"
                                            class="form-control @error('profesion') is-invalid @enderror"
                                            placeholder="Profesión"
                                            value="{{ old('profesion', $empleado->profesion) }}">
                                        @error('profesion')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-3">
                                    <label class="form-label" for="fecha_nacimiento">Fecha Nacimiento: </label>
                                    <input type="date" name="fecha_nacimiento" id="fecha_nacimiento"
                                        class="form-control @error('fecha_nacimiento') is-invalid @enderror"
                                        value="{{ old('fecha_nacimiento', $empleado->fecha_nacimiento?->format('Y-m-d')) }}"
                                        required>
                                    @error('fecha_nacimiento')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-3">
                                    <label class="form-label" for="genero">Género: </label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-gender-ambiguous"></i></span>
                                        <select name="genero" id="genero"
                                            class="form-control @error('genero') is-invalid @enderror">
                                            <option value="">Seleccione...</option>
                                            <option
                                                value="M"{{ old('genero', $empleado->genero) === 'M' ? 'selected' : '' }}>
                                                Masculino
                                            </option>
                                            <option
                                                value="F"{{ old('genero', $empleado->genero) === 'F' ? 'selected' : '' }}>
                                                Femenino
                                            </option>
                                        </select>
                                        @error('genero')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label class="form-label" for="direccion">Dirección: </label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                                        <input type="text" name="direccion" id="direccion"
                                            class="form-control @error('direccion') is-invalid @enderror"
                                            placeholder="Dirección"
                                            value="{{ old('direccion', $empleado->direccion) }}" required>
                                        @error('direccion')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label class="form-label" for="avatar">Avatar: </label>
                                    <input type="file" name="avatar" id="avatar"
                                        class="form-control @error('avatar') is-invalid @enderror" accept="image/*"
                                        onchange="previewImage(event)">
                                    @error('avatar')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                    <div class="mt-2">
                                        @if ($empleado->avatar)
                                            <img id="avatar-preview"
                                                src="{{ asset('storage/' . $empleado->avatar) }}" alt="Vista previa"
                                                style="max-width: 150px;" class="rounded">
                                        @else
                                            <img id="avatar-preview" src="#" alt="Vista previa"
                                                style="max-width: 150px; display: none;" class="rounded">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success mt-3">Actualizar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    @push('scripts')
        <script>
            function previewImage(event) {
                var reader = new FileReader();
                reader.onload = function() {
                    var preview = document.getElementById('avatar-preview');
                    preview.src = reader.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(event.target.files[0]);
            }
        </script>
    @endpush
</x-app-layout>
