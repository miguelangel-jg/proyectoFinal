<?php

namespace App\Http\Controllers;

use App\Models\Camisetas;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $camisetas = Camisetas::all();
        return view('index', compact('camisetas'));
    }

    public function show($id)
    {
        $camiseta = Camisetas::findOrFail($id);
        return view('camiseta_detalles', compact('camiseta'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_equipo' => 'required|string|max:255',
            'temporada' => 'required|string|max:255',
            'marca' => 'required|string|max:255',
            'talla' => 'required|string|max:5',
            'precio' => 'required|numeric',
            'stock' => 'required|integer|min:0',
            'imagen' => 'required|string|max:255',
        ]);

        Camisetas::create($request->all());
        return redirect()->route('home')->with('success', 'Camiseta agregada con éxito.');
    }

    public function edit($id)
    {
        $camiseta = Camisetas::findOrFail($id);
        return view('edit', compact('camiseta'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre_equipo' => 'required|string|max:255',
            'temporada' => 'required|string|max:255',
            'marca' => 'required|string|max:255',
            'talla' => 'required|string|max:5',
            'precio' => 'required|numeric',
            'stock' => 'required|integer|min:0',
            'imagen' => 'required|string|max:255',
        ]);

        $camiseta = Camisetas::findOrFail($id);
        $camiseta->update($request->all());
        return redirect()->route('camisetas.show', $id)->with('success', 'Camiseta actualizada con éxito.');
    }

    public function destroy($id)
    {
        $camiseta = Camisetas::findOrFail($id);
        $camiseta->delete();
        return redirect()->route('home')->with('success', 'Camiseta eliminada con éxito.');
    }
}
