<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;

class librosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libros = Libro::paginate(10);
        return view('libros.IndexLibro', compact('libros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $libro = new Libro();
        return view('libros.CreateLibro', compact('libro'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'titulo' => 'required',
            'autor' => 'required',
            'editorial' => 'required',
            'anio_publicacion' => 'required|integer',
            'cantidad_disponible' => 'required|integer',
        ]);

        $libro = new Libro();
        $libro->titulo = $request->titulo;
        $libro->autor = $request->autor;
        $libro->editorial = $request->editorial;
        $libro->anioPublicacion = $request->anio_publicacion;
        $libro->cantidadDisponible = $request->cantidad_disponible;
        $libro->save();


        return redirect()->route('libro.index')
            ->with('success', 'El libro ha sido creado exitosamente.');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $libro = Libro::findOrFail($id);
        return view('libros.EditLibro', compact('libro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|max:255',
            'autor' => 'required|max:255',
            'editorial' => 'required|max:255',
            'anio_publicacion' => 'required|integer',
            'cantidad_disponible' => 'required|integer',
        ]);


        $libro = Libro::findOrFail($id);
        $libro->titulo = $request->titulo;
        $libro->autor = $request->autor;
        $libro->editorial = $request->editorial;
        $libro->anio_Publicacion = $request->anio_publicacion;
        $libro->cantidad_disponible = $request->cantidad_disponible;
        $libro->save();

        return redirect()->route('libro.index')
            ->with('success', 'El libro ha sido actualizado exitosamente.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $libro = Libro::findOrFail($id);
        $libro->delete();

        return redirect()->route('libro.index')
            ->with('success', 'El libro ha sido eliminado exitosamente.');
    }

    public function buscar(Request $request)
    {
        $libros = Libro::where('titulo', 'like', '%'.$request->titulo.'%')->paginate(10);
        return view('libros.IndexLibro', compact('libros'));
    }

}
