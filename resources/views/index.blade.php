@extends('layouts.plantilla')

@section('title', 'Inventario de Camisetas')

@section('content')
    <div class="container">
        <h1 class="my-4 text-center">Gestión de Inventario de Camisetas</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Imagen</th>
                    <th>Equipo</th>
                    <th>Temporada</th>
                    <th>Marca</th>
                    <th>Talla</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($camisetas as $camiseta)
                    <tr>
                        <td>
                            <img src="{{ asset('storage/images/' . $camiseta->imagen) }}" alt="Imagen Camiseta"
                                class="img-fluid" style="max-width: 100px;">
                        </td>
                        <td>{{ $camiseta->nombre_equipo }}</td>
                        <td>{{ $camiseta->temporada }}</td>
                        <td>{{ $camiseta->marca }}</td>
                        <td>{{ $camiseta->talla }}</td>
                        <td>{{ $camiseta->precio }}€</td>
                        <td>{{ $camiseta->stock }}</td>
                        <td>
                            <a href="{{ route('camisetas.show', $camiseta->id) }}" class="btn btn-info btn-sm text-white">Ver
                                Detalles</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection