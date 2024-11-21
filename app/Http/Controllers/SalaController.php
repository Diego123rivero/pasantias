<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sala;

class SalaController extends Controller
{
    public function index()
    {
        // Obtener todas las categorías
        $sa = Sala::all();
        return view('sala', ['sa' => $sa]);
    }

    public function store(Request $request)
    {
        // Crear una nueva categoría con los datos del formulario
        $sala = new Sala($request->all());
        $sala->save();

        // Obtener todas las categorías después de agregar la nueva
        $sa = Sala::all();
        return view('sala', ['sa' => $sa]);
    }

    public function create()
    {
        // Mostrar la vista para crear una categoría
        return view('sala_crear');
    }

    public function show($id)
    {
        // Mostrar los detalles de una categoría
        $sala = Sala::findOrFail($id);
        return view('sala_ver', ['sala' => $sala]);
    }

    public function destroy($id)
    {
        // Eliminar una categoría
        $sala = Sala::findOrFail($id);
        $sala->delete();

        // Obtener todas las categorías después de la eliminación
        $sa = Sala::all();
        return view('sala', ['sa' => $sa]);
    }

    public function edit($id)
    {
        // Mostrar la vista para editar una categoría
        $sala = Sala::findOrFail($id);
        return view('sala_editar', ['sala' => $sala]);
    }

    public function update(Request $request, $id)
    {
        // Buscar la categoría a editar
        $sala= Categoria::findOrFail($id);
        $sala->nombre = $request->nombre;
        $sala->save();

        // Obtener todas las categorías después de actualizar
        $sa = Sala::all();
        return view('categoria', ['sa' => $sa]);
    }
}
