@extends('layout')
@section('title','Рейсы')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 m-0">Список рейсов</h1>
        <a class="btn btn-tc" href="{{ url('/trips/create') }}">+ Создать рейс</a>
    </div>
    <div class="tc-card p-3">
        <div class="table-responsive">
            <table class="table table-dark tc-table table-striped align-middle mb-3">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Маршрут</th>
                    <th>Транспорт</th>
                    <th>Отправление</th>
                    <th>Прибытие</th>
                    <th>Сумма груза, кг</th>
                    <th class="text-end">Действия</th>
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
                        <td class="text-end">
                            <a class="btn btn-sm btn-outline-tc" href="{{ url('/trips/'.$t->id) }}">Открыть</a>
                            <a class="btn btn-sm btn-outline-light" href="{{ url('/trips/edit/'.$t->id) }}">Редактировать</a>
                            <a class="btn btn-sm btn-danger"
                               href="{{ url('/trips/destroy/'.$t->id) }}"
                               onclick="return confirm('Удалить рейс #{{ $t->id }}?')">Удалить</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        {{ $trips->links() }}
    </div>
@endsection



