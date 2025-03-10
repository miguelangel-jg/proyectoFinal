@extends('layouts.plantilla')

@section('title', 'Editar Camiseta: ' . $camiseta->nombre_equipo)

@section('content')

    <div class="container mt-5">
        <h1 class="my-4 text-center">Editar Camiseta: {{ $camiseta->nombre_equipo }}</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('camisetas.update', $camiseta->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nombre_equipo" class="form-label">Nombre del Equipo:</label>
                <input type="text" name="nombre_equipo" value="{{ old('nombre_equipo', $camiseta->nombre_equipo) }}"
                    class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="temporada" class="form-label">Temporada:</label>
                <input type="text" name="temporada" value="{{ old('temporada', $camiseta->temporada) }}"
                    class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="marca" class="form-label">Marca:</label>
                <input type="text" name="marca" value="{{ old('marca', $camiseta->marca) }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="talla" class="form-label">Talla:</label>
                <input type="text" name="talla" value="{{ old('talla', $camiseta->talla) }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="precio" class="form-label">Precio:</label>
                <input type="number" name="precio" value="{{ old('precio', $camiseta->precio) }}" class="form-control"
                    step="0.01" required>
            </div>

            <div class="mb-3">
                <label for="stock" class="form-label">Stock:</label>
                <input type="number" name="stock" value="{{ old('stock', $camiseta->stock) }}" class="form-control"
                    required>
            </div>

            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen Actual:</label>
                <div>
                    <img src="{{ asset('storage/images/' . $camiseta->imagen) }}" alt="Imagen actual"
                        style="max-width: 200px;">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>

@endsection