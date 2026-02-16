@extends('layout')
@section('title','Редактировать рейс')
@section('content')
    <h1 class="h3 mb-3">Редактирование рейса #{{ $trip->id }}</h1>
    <div class="tc-card p-3">
        <form method="post" action="{{ url('/trips/update/'.$trip->id) }}">
            @csrf

            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Маршрут</label>
                    <select class="form-select" name="route_id">
                        <option value="" hidden></option>
                        @foreach($routes as $route)
                            <option value="{{ $route->id }}" @selected(old('route_id', $trip->route_id)==$route->id)>
                                {{ $route->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Транспорт</label>
                    <select class="form-select" name="transport_id">
                        <option value="" hidden></option>
                        @foreach($transports as $t)
                            <option value="{{ $t->id }}" @selected(old('transport_id', $trip->transport_id)==$t->id)>
                                {{ $t->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Отправление</label>
                    <input class="form-control" type="datetime-local" name="departure_at"
                           value="{{ old('departure_at', $trip->departure_at?->format('Y-m-d\\TH:i')) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Прибытие</label>
                    <input class="form-control" type="datetime-local" name="arrival_at"
                           value="{{ old('arrival_at', $trip->arrival_at?->format('Y-m-d\\TH:i')) }}">
                </div>
            </div>
            <div class="mt-3 d-flex gap-2">
                <button class="btn btn-tc" type="submit">Сохранить</button>
                <a class="btn btn-outline-tc" href="{{ url('/trips') }}">Назад</a>
            </div>
        </form>
    </div>
@endsection



