<x-app-layout :assets="$assets ?? []">
    <div>
        <form action="{{ route('sucursales.update', $sucursal->id) }}" method="post">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Editar Sucursal</h4>
                            </div>
                            <div class="card-action">
                                <a href="{{ route('sucursales.index') }}" class="btn btn-sm btn-primary"
                                    role="button">Volver</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-6">
                                    <label class="form-label" for="nombre">Nombre: <sup class="text-danger">(*)</sup></label>
                                    <input type="text" name="nombre" id="nombre" class="form-control"
                                        placeholder="Nombre de la sucursal" value="{{ old('nobre', $sucursal->nombre) }}" required>
                                        @error('nombre')
                                        <small style="color: red">{{ $message }}</small>
                                        @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label class="form-label" for="direccion">Dirección: </label>
                                    <input type="text" name="direccion" id="direccion" class="form-control"
                                        placeholder="Dirección" value="{{ old('direccion', $sucursal->direccion) }}">
                                        @error('direccion')
                                        <small style="color: red">{{ $message }}</small>
                                        @enderror
                                </div>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-success">Actualizar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
