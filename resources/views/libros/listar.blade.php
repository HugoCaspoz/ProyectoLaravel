<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
@extends ('layouts.main-layout')
@section('page-title', 'Libros')
@section('content-area')

    <h1>Catálogo de Libros</h1>
    <div class="row py-4">
        <table id="libros" class="table table-striped ">
            <thead class='bg-secondary text-white'>
                <tr>
                    <th>Titulo</th>
                    <th>Genero</th>
                    <th>Autor</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($libros as $libro)
                    <tr>
                        <td>{{ $libro->titulo }}</td>
                        <td>{{ $libro->genero }}</td>
                        <td>{{ $libro->autor }}</td>
                        <td class="text-nowrap">@priceformat($libro->precio)</td>
                        <td>{{ $libro->stock }}</td>
                        <td class='text-center'>
                            <a href="{{ route('libros.show', ['libro' => $libro]) }}">
                                <span class="material-icons">search</span>
                            </a>
                            <a href="{{ route('libros.edit', ['libro' => $libro]) }}">
                                <span class="material-icons text-primary">edit</span>
                            </a>
                            <a href="#deleteModal{{ $libro->id }}" data-bs-toggle="modal">
                                <i class="material-icons text-danger">delete</i>
                            </a>
                        </td>
                    </tr>
                    {{-- Delete Confirm Form --}}
                    <form action="{{ route('libros.destroy', ['libro' => $libro]) }}" method="post">
                        @method('DELETE')
                        @csrf
                        {{-- Delete Warning Modal --}}
                        <div class="modal fade" id="deleteModal{{$libro->id}}" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Eliminar Libro</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Se va a eliminar el libro <b>{{ $libro->titulo }}</b></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" data-bs-dismiss="modal"
                                            class="btn btn-secondary">Cancelar</button>
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                @endforeach
            </tbody>
        </table>
    </div>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#libros').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                }
            });
        });
    </script>

@endsection
