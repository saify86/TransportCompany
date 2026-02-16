@extends('layout')
@section('title','Рейс')
@section('content')
    @if(!$trip)
        <h1 class="h3">Рейс не найден</h1>
    @else
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="h3 m-0">Рейс #{{ $trip->id }}</h1>
            <a class="btn btn-outline-tc" href="{{ url('/trips') }}">Назад</a>
        </div>
        <div class="tc-card p-3 mb-3">
            <div class="row g-2">
                <div class="col-md-6"><span class="text-secondary">Маршрут:</span> {{ $trip->route?->name }}</div>
                <div class="col-md-6"><span class="text-secondary">Транспорт:</span> {{ $trip->transport?->name }} ({{ $trip->transport?->capacity_kg }} кг)</div>
                <div class="col-md-6"><span class="text-secondary">Суммарный вес грузов:</span> {{ $trip->total_cargo_weight_kg ?? 0 }} кг</div>
            </div>
        </div>
        <div class="tc-card p-3">
            <h2 class="h5 mb-3">Грузы и заказчики</h2>
            <div class="table-responsive">
                <table class="table table-dark tc-table table-striped align-middle mb-0">
                    <thead>
                    <tr>
                        <th>ID груза</th>
                        <th>Вес, кг</th>
                        <th>Заказчик</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($trip->cargo as $c)
                        <tr>
                            <td>{{ $c->id }}</td>
                            <td>{{ $c->weight_kg }}</td>
                            <td>{{ $c->user?->name }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="3" class="text-secondary">Грузов нет</td></tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection



