@extends('layouts.app')

@section('title', 'Маршруты')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <p class="text-uppercase text-warning fw-semibold mb-1">Справочник</p>
        <h1 class="h3 mb-0">Маршруты</h1>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        @if($routes->isEmpty())
            <p class="text-muted mb-0">Маршруты отсутствуют.</p>
        @else
            <div class="table-responsive">
                <table class="table table-dark table-striped align-middle mb-0">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Наименование</td>
                            <td>Тариф/кг</td>
                            <td>Дистанция</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($routes as $r)
                            <tr>
                                <td>{{ $r->id }}</td>
                                <td>{{ $r->name }}</td>
                                <td>{{ $r->tariff_per_kg }}</td>
                                <td>{{ $r->distance_km }} км</td>
                                <td>
                                    <a class="btn btn-sm btn-warning" href="/routes/{{ $r->id }}">Открыть</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
@endsection
