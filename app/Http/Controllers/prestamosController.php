<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\Prestamo;
use App\Models\Usuario;
use Illuminate\Http\Request;

class prestamosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prestamos = Prestamo::paginate(10);
        return view('prestamos.IndexPrestamo', compact('prestamos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prestamos = new Prestamo();
        $libros = Libro::all();
        $usuarios = Usuario::all();

        return view('prestamos.CreatePrestamo', compact('libros', 'usuarios'));
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
            'fecha_solicitud' => 'required',
            'fecha_prestamo' => 'required',
            'fecha_devolucion' => 'required',
            'libro_id' => 'required|integer',
            'usuario_id' => 'required|integer',
        ]);

        $prestamo = new Prestamo;
        $prestamo->fecha_solicitud = $request->input('fecha_solicitud');
        $prestamo->fecha_prestamo = $request->input('fecha_prestamo');
        $prestamo->fecha_devolucion = $request->input('fecha_devolucion');
        $prestamo->libro_id = $request->input('libro_id');
        $prestamo->usuario_id = $request->input('usuario_id');
        $prestamo->save();

        return redirect('prestamo.index')->with('success', 'Prestamo creado correctamente.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prestamo = Prestamo::find($id);
        $libros = Libro::all();
        $usuarios = Usuario::all();

        return view('prestamos.EditPrestamo', compact('prestamo', 'libros', 'usuarios'));
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
        $validatedData = $request->validate([
            'fecha_solicitud' => 'required',
            'fecha_prestamo' => 'required',
            'fecha_devolucion' => 'required',
            'libro_id' => 'required|integer',
            'usuario_id' => 'required|integer',
        ]);

        $prestamo = Prestamo::find($id);
        $prestamo->fecha_solicitud = $request->input('fecha_solicitud');
        $prestamo->fecha_prestamo = $request->input('fecha_prestamo');
        $prestamo->fecha_devolucion = $request->input('fecha-devolucion');
        $prestamo->libro_id = $request->input('libro_id');
        $prestamo->usuario_id = $request->input('usuario_id');
        $prestamo->save();

        return redirect('prestamo.index')->with('success', 'Prestamo actualizar correctamente.');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prestamo = Prestamo::findOrFail($id);
        $prestamo->delete();

        return redirect()->route('prestamo.index')
            ->with('success', 'El prestamo ha sido eliminado exitosamente.');
    }
    public function buscar(Request $request)
    {
        $busqueda = $request->input('buscar');
        $prestamos = Prestamo::where('id', 'LIKE', '%' . $busqueda . '%')
            ->orWhere('fecha_solicitud', 'LIKE', '%' . $busqueda . '%')
            ->orWhere('fecha_prestamo', 'LIKE', '%' . $busqueda . '%')
            ->orWhere('fecha_devolucion', 'LIKE', '%' . $busqueda . '%')
            ->paginate(10);
        $prestamos->appends(['busqueda' => $busqueda]);
        return view('prestamos.IndexPrestamo', compact('prestamos'));
    }
}
