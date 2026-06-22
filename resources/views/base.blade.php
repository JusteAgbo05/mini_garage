<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titre', 'Mini Garage')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar-brand {
            font-weight: 700;
            font-size: 1.4rem;
            letter-spacing: 1px;
        }
        .nav-link.active {
            font-weight: 600;
        }
        .card {
            border: none;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }
        .table thead {
            background-color: #343a40;
            color: #fff;
        }
        .badge-specialite {
            font-size: 0.85rem;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('vehicules.index') }}">
            <i class="bi bi-gear-fill me-2"></i>Mini Garage
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarMain">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a @class(['nav-link', 'active' => request()->routeIs('vehicules.*')])
                       href="{{ route('vehicules.index') }}">
                        <i class="bi bi-car-front me-1"></i>Vehicules
                    </a>
                </li>
                <li class="nav-item">
                    <a @class(['nav-link', 'active' => request()->routeIs('reparations.*')])
                       href="{{ route('reparations.index') }}">
                        <i class="bi bi-wrench me-1"></i>Reparations
                    </a>
                </li>
                <li class="nav-item">
                    <a @class(['nav-link', 'active' => request()->routeIs('techniciens.*')])
                       href="{{ route('techniciens.index') }}">
                        <i class="bi bi-person-gear me-1"></i>Techniciens
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container py-4">
    @if(session('succes'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i>{{ session('succes') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @yield('contenu')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
