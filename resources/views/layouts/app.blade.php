<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Transport Company')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --bg-dark: #0d0d0f;
            --panel-dark: #16161d;
            --accent: #ff8c32;
        }
        body {
            background-color: var(--bg-dark);
            color: #f8f9fa;
            min-height: 100vh;
        }
        .navbar {
            background-color: #0f0f15;
        }
        .navbar-brand, .nav-link, .navbar-text {
            color: #f8f9fa !important;
        }
        .nav-link.active {
            color: var(--accent) !important;
        }
        a {
            color: var(--accent);
        }
        a:hover {
            color: #ffad61;
        }
        .btn-warning {
            background-color: var(--accent);
            border-color: var(--accent);
            color: #0d0d0f;
            font-weight: 600;
        }
        .btn-warning:hover {
            background-color: #ffad61;
            border-color: #ffad61;
            color: #0d0d0f;
        }
        .card {
            background-color: var(--panel-dark);
            border-color: #2f2f3a;
        }
        .table-dark {
            --bs-table-bg: var(--panel-dark);
            --bs-table-striped-bg: #1c1c25;
        }
        .form-control, .form-select {
            background-color: #1a1a22;
            border-color: #343444;
            color: #f8f9fa;
        }
        .form-control:focus, .form-select:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 0.2rem rgba(255, 140, 50, 0.25);
        }
        .invalid-feedback { color: #ffb3b3; }
        .table thead td, .table thead th { color: #ffad61; }
        footer {
            color: #c7c7d3;
        }
    </style>
    @stack('styles')
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/">Transport Company</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="{{ url('/routes') }}">Маршруты</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/trips') }}">Рейсы</a></li>
            </ul>
            <div class="d-flex align-items-center gap-3">
                @auth
                    <span class="navbar-text">{{ auth()->user()->name }}</span>
                    <a class="btn btn-sm btn-outline-light" href="{{ route('logout') }}">Выйти</a>
                @else
                    <a class="btn btn-sm btn-warning" href="{{ route('login') }}">Войти</a>
                @endauth
            </div>
        </div>
    </div>
</nav>

<main class="container py-4">
    @if(session('ok'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('ok') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @yield('content')
</main>

<footer class="py-3 border-top border-secondary bg-black bg-opacity-50">
    <div class="container text-center small">
        Черно-оранжевая тема лабораторной работы №8
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
