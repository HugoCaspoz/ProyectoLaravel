@extends('layouts.main-layout')
@section('page-title', 'Editar ' . $libro->titulo)
@section('content-area')
    <h1>Editar Libro</h1>
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
        <form action="{{ route('libros.update', ['libro' => $libro]) }}" method="post">
            @method('PUT')
            @csrf
            <legend>Editar Libro</legend>
            <div class="row mt-4">
                <div class="input-field col-sm-12">
                    <label for="titulo">titulo</label>
                    <input type="text" name="titulo" id="titulo" class="form-control"
                        value="{{ old('titulo') ?: $libro->titulo }}" />
                </div>
            </div>
            <div class="row mt-4">
                <div class="input-field col-sm-12">
                    <label for="genero">Genero</label>
                    <input type="text" name="genero" id="genero" class="form-control"
                        value="{{ old('titulo') ?: $libro->genero }}" />
                </div>
            </div>
            <div class="row mt-4">
                <div class="input-field col-sm-12">
                    <label for="autor">Autor</label>
                    <input type="text" name="autor" id="autor" class="form-control"
                        value="{{ old('autor') ?: $libro->autor }}" />
                </div>
            </div>
            <div class="row mt-4">
                <div class="input-field col-sm-12">
                    <label for="descripcion">Descripcion</label>
                    <textarea name="descripcion" id="descripcion" class="form-control">
                        {{ old('descripcion') ?: $libro->descripcion }}
                    </textarea>
                </div>
            </div>
            <div class="row mt-4">
                <div class="input-field col-sm-4">
                    <label for="precio">Precio</label>
                    <input type="number" name="precio" id="precio" class="form-control" min="0.01" step="0.01"
                        value="{{ old('precio') ?: $libro->precio }}" />
                </div>
                <div class="input-field col-sm-4 text-center">
                    <label>Envío a domicilio</label><br />
                    <div class="btn-group" aria-label="Basic radio toggle button group" role="group">
                        <input type="radio" class="btn-check" name="envio" id="envio1" autocomplete="off"
                            value="N" checked="">
                        <label class="btn btn-outline-secondary" for="envio1">NO</label>
                        <input type="radio" class="btn-check" name="envio" id="envio2" autocomplete="off"
                            value="S" {{ old('envio') == 'S' ? 'checked' : ($libro->envio == 'S' ? 'checked' : '') }}>
                        <label class="btn btn-outline-secondary" for="envio2">SI</label>
                    </div>
                </div>
                <div class="input-field col-sm-4">
                    <label for="stock">Stock</label>
                    <input type="number" name="stock" id="stock" class="form-control" min="0"
                        value="{{ old('stock') ?: $libro->stock }}" />
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
