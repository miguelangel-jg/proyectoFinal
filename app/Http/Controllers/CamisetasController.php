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
        $request->validate([
            'nombre_equipo' => 'required|string|max:255',
            'temporada' => 'required|string|max:255',
            'marca' => 'required|string|max:255',
            'talla' => 'required|string|max:5',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = $imagen->hashName();
            $imagen->storeAs('public/images', $nombreImagen);
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
        $camiseta->imagen = $nombreImagen;

        $camiseta->save();

        return redirect()->route('camisetas.show', $camiseta);
    }
}
