@extends('layouts.app')

@section('title', 'Маршрут')

@section('content')
@if(!$route)
    <div class="alert alert-danger">Маршрут не найден</div>
@else
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <p class="text-uppercase text-warning fw-semibold mb-1">Маршрут</p>
            <h1 class="h3 mb-0">{{ $route->name }}</h1>
            <p class="text-secondary mb-0">Тариф: {{ $route->tariff_per_kg }} ₽/кг • Дистанция: {{ $route->distance_km }} км</p>
        </div>
        <a class="btn btn-warning" href="/routes/{{ $route->id }}/transports">Транспорты маршрута</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="h5 text-warning mb-3">Рейсы маршрута</h2>
            @if($route->trips->isEmpty())
                <p class="text-muted mb-0">Для этого маршрута пока нет рейсов.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-dark table-striped align-middle mb-0">
                        <thead>
                        <tr><td>ID</td><td>Транспорт</td><td>Отправление</td><td>Прибытие</td></tr>
                        </thead>
                        <tbody>
                        @foreach($route->trips as $t)
                            <tr>
                                <td><a href="/trips/{{ $t->id }}" class="link-warning">{{ $t->id }}</a></td>
                                <td>{{ $t->transport?->name }}</td>
                                <td>{{ $t->departure_at }}</td>
                                <td>{{ $t->arrival_at }}</td>
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
