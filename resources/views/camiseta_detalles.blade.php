@extends('layouts.plantilla')

@section('title', 'Detalles de Camiseta: ' . $camiseta->nombre_equipo)

@section('content')
    <!-- Botón para volver a la página principal -->
    <div class="mt-4">
        <a href="{{ route('home') }}" class="btn btn-outline-primary">Volver al Inicio</a>
    </div>
    <div class="container mt-5">
        <h1 class="my-4 text-center"><u>Detalles de la Camiseta:</u> {{ $camiseta->nombre_equipo }}</h1>

        <!-- Mensajes de éxito -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="row">
            <!-- Imagen de la camiseta -->
            <div class="col-md-5 mb-4">
                <img src="{{ asset('storage/images/' . $camiseta->imagen) }}" alt="Imagen de la camiseta" class="img-fluid">
            </div>

            <!-- Detalles de la camiseta -->
            <div class="col-md-6 ms-5">
                <h3 class="mb-3">Información</h3>
                <p><strong>Temporada:</strong> {{ $camiseta->temporada }}</p>
                <p><strong>Marca:</strong> {{ $camiseta->marca }}</p>
                <p><strong>Talla:</strong> {{ $camiseta->talla }}</p>
                <p><strong>Precio:</strong> {{$camiseta->precio}}€</p>
                <p><strong>Stock:</strong> {{ $camiseta->stock }}</p>

                <!-- Formulario para actualizar el stock -->
                <h4 class="mt-4">Actualizar Stock</h4>
                <form action="{{ route('camisetas.actualizarStock', $camiseta->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="stock" class="form-label">Nuevo Stock:</label>
                        <input type="number" name="stock" value="{{ $camiseta->stock }}" class="form-control" min="0"
                            max="1000" required>
                    </div>

                    <button type="submit" class="btn btn-success">Actualizar Stock</button>
                </form>

                <div class="mt-3">
                    <h4>Más opciones...</h4>
                    <div class="d-flex">
                        <!-- Botón para editar la camiseta -->
                        <a href="{{ route('camisetas.edit', $camiseta->id) }}"
                            class="btn btn-warning text-white me-2">Editar Camiseta</a>

                        <!-- Eliminar camiseta -->
                        <form action="{{ route('camisetas.destroy', $camiseta->id) }}" method="POST" class="mt-3">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger ">Eliminar Camiseta</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection