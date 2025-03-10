<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Tienda de Camisetas de Fútbol')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="shortcut icon" href="/proyectoFinal/public/storage/images/icon.png" type="image/x-icon">
    @yield('styles')
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container-fluid d-flex justify-content-between align-items-center">

            <div class="d-flex align-items-center">
                <a class="text-decoration-none text-white h3 me-2" href="{{ route('home') }}">
                    La tienda del Gitano
                </a>
                <img src="/proyectoFinal/public/storage/images/logo.png" alt="Logo" width="50" height="50">
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
                aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
                <ul class="navbar-nav d-flex align-items-center">
                    <li class="nav-item mx-2">
                        <a class="nav-link text-white" href="#">
                            <i class="fa fa-shopping-cart fa-lg"></i>
                        </a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link text-white" href="#">
                            <i class="fa fa-user fa-lg"></i>
                        </a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link text-white d-flex align-items-center" href="{{ route('camisetas.create') }}">
                            <h5 class="mb-0 me-2">Agregar Camiseta</h5>
                            <img src="/proyectoFinal/public/storage/images/icon.png" alt="icon" width="40" height="40">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <footer class="bg-dark text-white text-center py-4 mt-5">
        <p> Proyecto Creado por Miguel Angel Jimenez Garrido.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @yield('scripts')
</body>

</html>