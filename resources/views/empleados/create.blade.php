<x-app-layout :assets="$assets ?? []">
    <div>
        <form action="{{ route('empleados.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Nuevo Empleado</h4>
                            </div>
                            <div class="card-action">
                                <a href="{{ route('empleados.index') }}" class="btn btn-sm btn-primary"
                                    role="button">Volver</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-6">
                                    <label class="form-label" for="nombre">Nombres: <sup
                                            class="text-danger">(*)</sup></label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                                        <input type="text" name="nombres" id="nombres"
                                            class="form-control @error('nombres') is-invalid @enderror"
                                            placeholder="Nombres" value="{{ old('nobres') }}" required>
                                        @error('nombres')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label class="form-label" for="apellidos">Apellidos: <sup
                                            class="text-danger">(*)</sup></label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                                        <input type="text" name="apellidos" id="apellidos"
                                            class="form-control @error('apellidos') is-invalid @enderror"
                                            placeholder="Apellidos" value="{{ old('apellidos') }}" required>
                                        @error('apellidos')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-3">
                                    <label class="form-label" for="tipo_doc">Tipo Documento: <sup
                                            class="text-danger">(*)</sup></label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-card-list"></i></span>
                                        <select name="tipo_doc" id="tipo_doc"
                                            class="form-control @error('tipo_doc') is-invalid @enderror" required>
                                            <option value="">Seleccione...</option>
                                            <option value="CI"{{ old('tipo_doc') === 'CI' ? 'selected' : '' }}>CI
                                            </option>
                                            <option value="DNI"{{ old('tipo_doc') === 'DNI' ? 'selected' : '' }}>DNI
                                            </option>
                                            <option value="RUC"{{ old('tipo_doc') === 'RUC' ? 'selected' : '' }}>RUC
                                            </option>
                                            <option
                                                value="PASAPORTE"{{ old('tipo_doc') === 'PASAPORTE' ? 'selected' : '' }}>
                                                PASAPORTE</option>
                                            <option value="OTRO"{{ old('tipo_doc') === 'OTRO' ? 'selected' : '' }}>
                                                OTRO</option>
                                        </select>
                                        @error('tipo_doc')
                                            <div class="invalid-feedback">{{ $message }}</div>
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
                                            placeholder="Número de documento" value="{{ old('numero_doc') }}" required>
                                        @error('numero_doc')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-3">
                                    <label class="form-label" for="telefono">Teléfono: </label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                                        <input type="text" name="telefono" id="telefono"
                                            class="form-control @error('telefono') is-invalid @enderror"
                                            placeholder="Teléfono" value="{{ old('telefono') }}" required>
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
                                            placeholder="Correo electrónico" value="{{ old('email') }}" required>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label class="form-label" for="profesion">Profesión: </label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-briefcase"></i></span>
                                        <input type="text" name="profesion" id="profesion"
                                            class="form-control @error('profesion') is-invalid @enderror"
                                            placeholder="Profesión" value="{{ old('profesion') }}" required>
                                        @error('profesion')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-3">
                                    <label class="form-label" for="fecha_nacimiento">Fecha Nacimiento: </label>
                                    <input type="date" name="fecha_nacimiento" id="fecha_nacimiento"
                                        class="form-control @error('fecha_nacimiento') is-invalid @enderror"
                                        value="{{ old('fecha_nacimiento') }}" required>
                                    @error('fecha_nacimiento')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-3">
                                    <label class="form-label" for="genero">Género: </label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-gender-ambiguous"></i></span>
                                        <select name="genero" id="genero"
                                            class="form-control @error('genero') is-invalid @enderror">
                                            <option value="">Seleccione...</option>
                                            <option value="M"{{ old('genero') === 'M' ? 'selected' : '' }}>
                                                Masculino
                                            </option>
                                            <option value="F"{{ old('genero') === 'F' ? 'selected' : '' }}>
                                                Femenino
                                            </option>
                                        </select>
                                        @error('genero')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label class="form-label" for="direccion">Dirección: </label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                                        <input type="text" name="direccion" id="direccion"
                                            class="form-control @error('direccion') is-invalid @enderror"
                                            placeholder="Dirección" value="{{ old('direccion') }}" required>
                                        @error('direccion')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label class="form-label" for="avatar">Avatar: </label>
                                        <input type="file" name="avatar" id="avatar"
                                            class="form-control @error('avatar') is-invalid @enderror" accept="image/*"
                                            onchange="previewImage(event)">
                                        @error('avatar')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="mt-2">
                                            <img id="avatar-preview" src="#" alt="Vista previa"
                                                style="max-width: 150px; display: none;" class="rounded">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Guardar</button>
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
