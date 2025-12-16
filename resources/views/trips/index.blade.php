@extends('layouts.app')

@section('title', 'Рейсы')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <p class="text-uppercase text-warning fw-semibold mb-1">Управление</p>
        <h1 class="h3 mb-0">Рейсы</h1>
    </div>
    <a class="btn btn-warning" href="{{ url('/trips/create') }}">+ Создать рейс</a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        @if($trips->isEmpty())
            <p class="text-muted mb-0">Рейсы отсутствуют.</p>
        @else
            <div class="table-responsive">
                <table class="table table-dark table-striped align-middle mb-0">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Маршрут</td>
                            <td>Транспорт</td>
                            <td>Отправление</td>
                            <td>Прибытие</td>
                            <td>Сумма груза, кг</td>
                            <td>Действия</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($trips as $t)
                            <tr>
                                <td>{{ $t->id }}</td>
                                <td>{{ $t->route?->name }}</td>
                                <td>{{ $t->transport?->name }}</td>
                                <td>{{ $t->departure_at }}</td>
                                <td>{{ $t->arrival_at }}</td>
                                <td>{{ $t->total_cargo_weight_kg ?? 0 }}</td>
                                <td class="d-flex flex-wrap gap-2">
                                    <a class="btn btn-sm btn-outline-light" href="{{ url('/trips/'.$t->id) }}">Открыть</a>
                                    <a class="btn btn-sm btn-outline-warning" href="{{ url('/trips/edit/'.$t->id) }}">Редактировать</a>
                                    <a class="btn btn-sm btn-outline-danger" href="{{ url('/trips/destroy/'.$t->id) }}"
                                       onclick="return confirm('Удалить рейс #{{ $t->id }}?')">Удалить</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                {{ $trips->links('pagination::bootstrap-5') }}
            </div>
        @endif
    </div>
</div>
@endsection
