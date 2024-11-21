<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function index()
    {
        // Obtener todas las categorías
        $it = Item::all();
        return view('item', ['it' => $it]);
    }

    public function store(Request $request)
    {
        // Crear una nueva categoría con los datos del formulario
        $item = new Item($request->all());
        $item->save();

        // Obtener todas las categorías después de agregar la nueva
        $it = Item::all();
        return view('item', ['it' => $it]);
    }

    public function create()
    {
        // Mostrar la vista para crear una categoría
        return view('item_crear');
    }

    public function show($id)
    {
        // Mostrar los detalles de una categoría
        $item = Item::findOrFail($id);
        return view('item_ver', ['item' => $item]);
    }

    public function destroy($id)
    {
        // Eliminar una categoría
        $item = Item::findOrFail($id);
        $item->delete();

        // Obtener todas las categorías después de la eliminación
        $it = Item::all();
        return view('item', ['it' => $it]);
    }

    public function edit($id)
    {
        // Mostrar la vista para editar una categoría
        $item = Item::findOrFail($id);
        return view('item_editar', ['item' => $item]);
    }

    public function update(Request $request, $id)
{
    // Buscar el item a editar
    $item = Item::findOrFail($id);

    // Actualizar los campos del item con los datos del formulario
    $item->categoria = $request->categoria;      // NOT NULL
    $item->subcategoria = $request->subcategoria; // NOT NULL
    $item->item = $request->item;                // NOT NULL
    $item->marca = $request->marca;              // Puede ser NULL
    $item->modelo = $request->modelo;            // Puede ser NULL
    $item->serie = $request->serie;              // Puede ser NULL
    $item->color = $request->color;              // Puede ser NULL
    $item->estado = $request->estado;            // NOT NULL
    $item->ubicacion = $request->ubicacion;      // NOT NULL

    // Guardar los cambios en la base de datos
    $item->save();

    // Obtener todos los items después de actualizar
    $it = Item::all();
    return view('item', ['it' => $it]);
}

}