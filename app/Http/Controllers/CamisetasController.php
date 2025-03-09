<?php

namespace App\Http\Controllers;

use App\Models\Camisetas;
use Illuminate\Http\Request;

class CamisetasController extends Controller
{
    public function edit($id)
    {
        $camiseta = Camisetas::findOrFail($id);
        return view('camisetas.edit', compact('camiseta'));
    }

    public function actualizarStock(Request $request, $id)
    {
        // Buscar la camiseta por ID
        $camiseta = Camisetas::findOrFail($id);

        // Actualizar solo el stock
        $camiseta->stock = $request->stock;

        // Guardar la camiseta con el nuevo stock
        $camiseta->save();

        // Redirigir con mensaje de éxito
        return redirect()->route('camisetas.show', $camiseta->id)
            ->with('success', 'Stock actualizado correctamente.');
    }

    public function destroy($id)
    {
        // Buscar la camiseta por ID
        $camiseta = Camisetas::findOrFail($id);

        // Eliminar la camiseta
        $camiseta->delete();

        // Redirigir con mensaje de éxito
        return redirect()->route('home')->with('success', 'Camiseta eliminada correctamente.');
    }


    public function update(Request $request, $id)
    {
        // Buscar la camiseta por ID
        $camiseta = Camisetas::findOrFail($id);

        // Actualizar los datos de la camiseta sin validar la imagen
        $camiseta->nombre_equipo = $request->nombre_equipo;
        $camiseta->temporada = $request->temporada;
        $camiseta->marca = $request->marca;
        $camiseta->talla = $request->talla;
        $camiseta->precio = $request->precio;
        $camiseta->stock = $request->stock;

        // Guardar la camiseta sin tocar la imagen (no la actualizas)
        $camiseta->save();

        // Redirigir con éxito
        return redirect()->route('camisetas.show', $camiseta->id)
            ->with('success', 'Camiseta actualizada correctamente.');
    }

    // Mostrar el formulario para crear una camiseta
    public function create()
    {
        return view('create');
    }

    // Almacenar la nueva camiseta
    public function store(Request $request)
    {
        // Validación de los datos (la imagen está siendo requerida solo al crear)
        $request->validate([
            'nombre_equipo' => 'required|string|max:255',
            'temporada' => 'required|string|max:255',
            'marca' => 'required|string|max:255',
            'talla' => 'required|string|max:5',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Manejo de la imagen
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = $imagen->hashName(); // Guarda solo el nombre del archivo
            $imagen->storeAs('public/images', $nombreImagen); // Guarda en storage/app/public/images
        } else {
            $nombreImagen = null;
        }

        $camiseta = new Camisetas();
        $camiseta->nombre_equipo = $request->nombre_equipo;
        $camiseta->temporada = $request->temporada;
        $camiseta->marca = $request->marca;
        $camiseta->talla = $request->talla;
        $camiseta->precio = $request->precio;
        $camiseta->stock = $request->stock;
        $camiseta->imagen = $nombreImagen; // Guardar solo el nombre del archivo

        $camiseta->save();

        // Redirigir con mensaje de éxito
        return redirect()->route('camisetas.show', $camiseta);
    }
}
