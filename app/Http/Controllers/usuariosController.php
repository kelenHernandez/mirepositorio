<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class usuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuario::paginate(10);
        return view('usuarios.IndexUsuario', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios = Usuario::paginate(10);
        return view('usuarios.CreateUsuario', compact('usuarios'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required',
            'correo_electronico' => 'required',
            'numero_telefonico' => 'required',
            'direccion_Usuario' => 'required|string',
        ]);

        $usuarios = new Usuario();
        $usuarios->nombre = $request->nombre;
        $usuarios->correo_electronico = $request->correo_electronico;
        $usuarios->numero_telefonico = $request->numero_telefonico;
        $usuarios->direccion_Usuario = $request->direccion_Usuario;
        $usuarios->save();


        return redirect()->route('usuario.index')
            ->with('success', 'El usuario ha sido creado exitosamente.');
    }


    public function show($id)
    {

    }


    public function edit($id)
    {
        $usuarios = Usuario::findOrFail($id);
        return view('usuarios.EditUsuario', compact('usuarios'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nombre' => 'required',
            'correo_electronico' => 'required',
            'numero_telefonico' => 'required',
            'direccion_Usuario' => 'required|string',
        ]);

        $usuarios = new Usuario();
        $usuarios->nombre = $request->nombre;
        $usuarios->correo_electronico = $request->correo_electronico;
        $usuarios->numero_telefonico = $request->numero_telefonico;
        $usuarios->direccion_Usuario = $request->direccion_Usuario;
        $usuarios->save();


        return redirect()->route('usuario.index')
            ->with('success', 'El usuario ha sido actualizado exitosamente.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuarios = Usuario::findOrFail($id);
        $usuarios->delete();

        return redirect()->route('usuario.index')
            ->with('success', 'El usuario ha sido eliminado exitosamente.');
    }

    public function buscar(Request $request)
    {
        $busqueda = $request->input('busqueda');
        $usuarios = Usuario::where('nombre', 'LIKE', '%' . $busqueda . '%')
            ->orWhere('correo_electronico', 'LIKE', '%' . $busqueda . '%')
            ->orWhere('numero_telefonico', 'LIKE', '%' . $busqueda . '%')
            ->orWhere('direccion_Usuario', 'LIKE', '%' . $busqueda . '%')
            ->paginate(10);
        $usuarios->appends(['busqueda' => $busqueda]);
        return view('usuarios.IndexUsuario', compact('usuarios'));
    }
}
