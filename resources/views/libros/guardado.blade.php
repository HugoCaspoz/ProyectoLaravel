@extends('layouts.main-layout')
@section('page-title', 'Libro '.$operacion)
@section('content-area')
<h1>Libro {{ $operacion }}</h1>
<hr/>
<div class='container-fluid'>
<h2>Libro {{ $libro }} {{ $operacion }} correctamente</h2>
<br/>
<h2><a href="{{ route('libros.index') }}">Volver</a></h2>
</div>
@endsection

