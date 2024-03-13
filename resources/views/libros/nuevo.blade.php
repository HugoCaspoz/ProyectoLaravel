<form action="{{ route('libros.store') }}" method="post">
    @csrf
    @extends('layouts.main-layout')
    @section('page-title', 'Nuevo Libro')
    @section('content-area')
        <h1>Nuevo Libro</h1>
        <hr />
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li><strong>{{ $error }}</strong></li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="container-fluid">
            <form action="{{ route('libros.store') }}" method="post">
                @csrf
                <legend>Nuevo Libro</legend>
                <div class="row mt-4">
                    <div class="input-field col-sm-12">
                        <label for="form_titulo">Titulo</label>
                        <input type="text" name="form_titulo" id="form_titulo" class="form-control" value="{{ old('form_titulo') }}"/>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="input-field col-sm-12">
                        <label for="form_genero">Genero</label>
                        <input type="text" name="form_genero" id="form_genero" class="form-control" value="{{ old('form_genero') }}"/>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="input-field col-sm-12">
                        <label for="form_autor">Autor</label>
                        <input type="text" name="form_autor" id="form_autor" class="form-control" value="{{ old('form_autor') }}"/>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="input-field col-sm-12">
                        <label for="form_descripcion">Descripcion</label>
                        <textarea name="form_descripcion" id="form_descripcion" class="form-control">{{ old('form_descripcion') }}</textarea>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="input-field col-sm-4">
                        <label for="form_precio">Precio</label>
                        <input type="number" name="form_precio" id="form_precio" class="form-control" min="0.01"
                            step="0.01" />
                    </div>
                    <div class="input-field col-sm-4 text-center">
                        <label>Envío a domicilio</label><br />
                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                            <input type="radio" class="btn-check" name="form_envio" id="form_envio1" autocomplete="off"
                                value="N" checked />
                            <label class="btn btn-outline-secondary" for="form_envio1">NO</label>
                            <input type="radio" class="btn-check" name="form_envio" id="form_envio2" autocomplete="off"
                                value="S" />
                            <label class="btn btn-outline-secondary" for="form_envio2">SI</label>
                        </div>
                    </div>
                    <div class="input-field col-sm-4">
                        <label for="form_stock">Stock</label>
                        <input type="number" name="form_stock" id="form_stock" class="form-control" min="0" />
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="input-field col-sm-6 text-lg-end">
                        <input type="submit" class="btn btn-primary" value="Enviar" />
                    </div>
                    <div class="input-field col-sm-6 text-lg-start">
                        <input type="reset" class="btn btn-danger" value="Borrar" />
                    </div>
                </div>
            </form>
        </div>
    @endsection
</form>
