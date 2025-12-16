@extends('layouts.app')

@section('title', 'Рейс')

@section('content')
@if(!$trip)
    <div class="alert alert-danger">Рейс не найден</div>
@else
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <p class="text-uppercase text-warning fw-semibold mb-1">Рейс</p>
            <h1 class="h3 mb-0">#{{ $trip->id }}</h1>
            <p class="text-secondary mb-0">Маршрут: {{ $trip->route?->name }} • Транспорт: {{ $trip->transport?->name }} ({{ $trip->transport?->capacity_kg }} кг)</p>
        </div>
        <a class="btn btn-outline-warning" href="/trips/{{ $trip->id }}/users">Заказчики и веса</a>
    </div>

    <div class="card shadow-sm mb-3">
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="text-secondary">Отправление</div>
                    <div class="fw-semibold">{{ $trip->departure_at }}</div>
                </div>
                <div class="col-md-6">
                    <div class="text-secondary">Прибытие</div>
                    <div class="fw-semibold">{{ $trip->arrival_at }}</div>
                </div>
                <div class="col-12">
                    <div class="text-secondary">Суммарный вес грузов</div>
                    <div class="fw-semibold">{{ $trip->total_cargo_weight_kg ?? 0 }} кг</div>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="h5 text-warning mb-3">Грузы и заказчики</h2>
            @if($trip->cargo->isEmpty())
                <p class="text-muted mb-0">Для рейса не добавлены грузы.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-dark table-striped align-middle mb-0">
                        <thead>
                        <tr><td>ID груза</td><td>Вес, кг</td><td>Заказчик</td></tr>
                        </thead>
                        <tbody>
                        @foreach($trip->cargo as $c)
                            <tr>
                                <td>{{ $c->id }}</td>
                                <td>{{ $c->weight_kg }}</td>
                                <td>{{ $c->user?->name }}</td>
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
