<x-app-layout :assets="$assets ?? []">
    <div>
        <form action="{{ route('categorias.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Nueva Categoria</h4>
                            </div>
                            <div class="card-action">
                                <a href="{{ route('categorias.index') }}" class="btn btn-sm btn-primary"
                                    role="button">Volver</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-6">
                                    <label class="form-label" for="nombre">Nombre: <sup class="text-danger">(*)</sup></label>
                                    <input type="text" name="nombre" id="nombre" class="form-control"
                                        placeholder="Nombre de la categoria" value="{{ old('nobre') }}" required>
                                        @error('nombre')
                                        <small style="color: red">{{ $message }}</small>
                                        @enderror
                                </div>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
