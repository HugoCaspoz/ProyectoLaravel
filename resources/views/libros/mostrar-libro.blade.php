@extends('layouts.main-layout')
@section('page-title', $libro->titulo)
@section('content-area')
    <h1>Detalle de libro: {{ $libro->titulo }}</h1>
    <hr />
    <div class="row">
        <div class="col-sm-2">
            <strong class="text-danger">ID: </strong>
        </div>
        <div class="col-sm-10">
            {{ $libro->id }}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <strong class="text-danger">TITULO: </strong>
        </div>
        <div class="col-sm-10">
            {{ $libro->titulo }}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <strong class="text-danger">GENERO: </strong>
        </div>
        <div class="col-sm-10">
            {{($libro->genero)}}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <strong class="text-danger">AUTOR: </strong>
        </div>
        <div class="col-sm-10">
           {{($libro->autor)}}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <strong class="text-danger">DESCRIPCIÓN: </strong>
        </div>
        <div class="col-sm-10">
            {{ $libro->descripcion }}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <strong class="text-danger">PRECIO: </strong>
        </div>
        <div class="col-sm-10">
            @priceformat($libro->precio)
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <strong class="text-danger">ENVIO: </strong>
        </div>
        <div class="col-sm-10">
            {{($libro->envio)}}
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <strong class="text-danger">STOCK: </strong>
        </div>
        <div class="col-sm-10">
            {{($libro->stock)}}
        </div>
    </div>

    <!-- Resto de campos -->
    <hr />
    <h2><a href="{{ route('libros.index') }}">Volver al catálogo</a></h2>
@endsection
