<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LibroController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libros = Libro::all();
        return view('libros.listar')->with(['libros' => $libros]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('libros.nuevo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $reglas = [
            'form_titulo' => 'required|max:50|unique:libros,titulo',
            'form_genero' => 'required|max:50',
            'form_autor' => 'required|max:50',
            'form_descripcion' => 'required',
            'form_precio' => 'required|gte:0',
            'form_stock' => 'required|gte:0',
            'form_envio' => 'required|in:N,S',
        ];
        $request->validate($reglas);

        Libro::create([
            'titulo' => $request->form_titulo,
            'genero' => $request->form_genero,
            'autor' => $request->form_autor,
            'descripcion' => $request->form_descripcion,
            'precio' => $request->form_precio,
            'envio' => $request->form_envio,
            'stock' => $request->form_stock
        ]);

        return view('libros.guardado')->with([
            'libro' => $request->form_titulo,
            'operacion' => 'añadido']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function show(Libro $libro)
    {
        return view ('libros.mostrar-libro')->with(['libro'=>$libro]);    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function edit(Libro $libro)
    {
        return view('libros.editar')->with(['libro' => $libro]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Libro $libro)
    {
        // $reglas = [
        //     'titulo' => 'required|max:50|unique:libros,titulo,'. $libro->id,
        //     'form_genero' => 'required|max:50',
        //     'form_autor' => 'required|max:50',
        //     'form_descripcion' => 'required',
        //     'form_precio' => 'required|gte:0',
        //     'form_stock' => 'required|gte:0',
        //     'form_envio' => 'required|in:N,S',
        // ];
        // $request->validate($reglas);
        $libroEditado = Libro::find($libro->id);
        $libroEditado->titulo = $request->titulo;
        $libroEditado->genero = $request->genero;
        $libroEditado->autor = $request->autor;
        $libroEditado->descripcion = $request->descripcion;
        $libroEditado->precio = $request->precio;
        $libroEditado->stock = $request->stock;
        $libroEditado->save();
        return view('libros.guardado')->with([
            'libro' => $libroEditado->titulo,
            'operacion' => 'actualizado',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Libro $libro)
    {
        $titulo = $libro->titulo;
        $libro->delete();
        return view('libros.guardado')->with([
            'libro' => $titulo,
            'operacion' => 'eliminado',
        ]);
    }
}
