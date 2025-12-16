@extends('layouts.app')

@section('title', 'Транспорт → Маршруты')

@section('content')
@if(!$transport)
    <div class="alert alert-danger">Транспорт не найден</div>
@else
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <p class="text-uppercase text-warning fw-semibold mb-1">Транспорт</p>
            <h1 class="h3 mb-0">{{ $transport->name }}</h1>
            <p class="text-secondary mb-0">Маршруты, назначенные на транспорт</p>
        </div>
        <a class="btn btn-outline-light" href="/transports">К списку транспортов</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            @if($transport->routesMany->isEmpty())
                <p class="text-muted mb-0">Нет связанных маршрутов.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-dark table-striped align-middle mb-0">
                        <thead>
                        <tr><td>ID</td><td>Маршрут</td><td>Дистанция</td><td>Отпр.</td><td>Приб.</td></tr>
                        </thead>
                        <tbody>
                        @foreach($transport->routesMany as $r)
                            <tr>
                                <td>{{ $r->id }}</td>
                                <td>{{ $r->name }}</td>
                                <td>{{ $r->distance_km }}</td>
                                <td>{{ $r->pivot->departure_at }}</td>
                                <td>{{ $r->pivot->arrival_at }}</td>
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
