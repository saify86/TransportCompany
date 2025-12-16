@extends('layouts.app')

@section('title', 'Маршрут → Транспорты')

@section('content')
@if(!$route)
    <div class="alert alert-danger">Маршрут не найден</div>
@else
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <p class="text-uppercase text-warning fw-semibold mb-1">Маршрут</p>
            <h1 class="h3 mb-0">{{ $route->name }}</h1>
            <p class="text-secondary mb-0">Транспорты, назначенные на маршрут</p>
        </div>
        <a class="btn btn-outline-light" href="/routes/{{ $route->id }}">Назад</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            @if($route->transportsMany->isEmpty())
                <p class="text-muted mb-0">Нет привязанных транспортов.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-dark table-striped align-middle mb-0">
                        <thead>
                        <tr><td>ID</td><td>Название</td><td>Г/п, кг</td><td>Отпр.</td><td>Приб.</td></tr>
                        </thead>
                        <tbody>
                        @foreach($route->transportsMany as $t)
                            <tr>
                                <td>{{ $t->id }}</td>
                                <td>{{ $t->name }}</td>
                                <td>{{ $t->capacity_kg }}</td>
                                <td>{{ $t->pivot->departure_at }}</td>
                                <td>{{ $t->pivot->arrival_at }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endif
@endsection
