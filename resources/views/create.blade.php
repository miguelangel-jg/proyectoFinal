@extends('layouts.plantilla')

@section('title', 'Agregar Nueva Camiseta')

@section('content')

    <div class="container mt-5">
        <div class="mt-4">
            <a href="{{ route('home') }}" class="btn btn-outline-primary">Volver al Inicio</a>
        </div>

        <h1 class="my-4 text-center">Agregar Nueva Camiseta</h1>

        <form action="{{ route('camisetas.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="nombre_equipo" class="form-label">Nombre del Equipo:</label>
                <input type="text" name="nombre_equipo" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="temporada" class="form-label">Temporada:</label>
                <input type="text" name="temporada" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="marca" class="form-label">Marca:</label>
                <input type="text" name="marca" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="talla" class="form-label">Talla:</label>
                <input type="text" name="talla" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="precio" class="form-label">Precio:</label>
                <input type="number" name="precio" class="form-control" min="1" max="200" required>
            </div>

            <div class="mb-3">
                <label for="stock" class="form-label">Stock:</label>
                <input type="number" name="stock" class="form-control" min="1" max="100" required>
            </div>

            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen:</label>
                <input type="file" name="imagen" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Guardar Camiseta</button>
        </form>
    </div>

@endsection