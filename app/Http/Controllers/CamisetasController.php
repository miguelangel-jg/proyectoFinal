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
        $camiseta = Camisetas::findOrFail($id);

        $camiseta->stock = $request->stock;

        $camiseta->save();


        return redirect()->route('camisetas.show', $camiseta->id)
            ->with('success', 'Stock actualizado correctamente.');
    }

    public function destroy($id)
    {

        $camiseta = Camisetas::findOrFail($id);

        $camiseta->delete();

        return redirect()->route('home')->with('success', 'Camiseta eliminada correctamente.');
    }


    public function update(Request $request, $id)
    {
        $camiseta = Camisetas::findOrFail($id);


        $camiseta->nombre_equipo = $request->nombre_equipo;
        $camiseta->temporada = $request->temporada;
        $camiseta->marca = $request->marca;
        $camiseta->talla = $request->talla;
        $camiseta->precio = $request->precio;
        $camiseta->stock = $request->stock;

        $camiseta->save();

        return redirect()->route('camisetas.show', $camiseta->id)
            ->with('success', 'Camiseta actualizada correctamente.');
    }


    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        // Almacenamos la imagen en el directorio público
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = $imagen->hashName(); // Nombre único para la imagen
            $imagen->storeAs('public/images', $nombreImagen);  // Almacenamos la imagen en storage/app/public/images
        } else {
            $nombreImagen = null;
        }

        // Guardamos la camiseta en la base de datos
        $camiseta = new Camisetas();
        $camiseta->nombre_equipo = $request->nombre_equipo;
        $camiseta->temporada = $request->temporada;
        $camiseta->marca = $request->marca;
        $camiseta->talla = $request->talla;
        $camiseta->precio = $request->precio;
        $camiseta->stock = $request->stock;
        $camiseta->imagen = $nombreImagen;

        $camiseta->save();

        // Redirigir con éxito
        return redirect()->route('camisetas.show', $camiseta->id)
            ->with('success', 'Camiseta agregada correctamente.');
    }
}
