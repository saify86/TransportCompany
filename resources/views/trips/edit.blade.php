@extends('layouts.app')

@section('title', 'Редактировать рейс')

@section('content')
<div class="mb-4">
    <p class="text-uppercase text-warning fw-semibold mb-1">Редактирование</p>
    <h1 class="h3 mb-0">Рейс #{{ $trip->id }}</h1>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <form class="row g-4" method="post" action="{{ url('/trips/update/'.$trip->id) }}">
            @csrf

            <div class="col-md-6">
                <label class="form-label">Маршрут</label>
                <select name="route_id" class="form-select @error('route_id') is-invalid @enderror" value="{{ old('route_id') }}">
                    <option style="display:none"></option>
                    @foreach($routes as $route)
                        <option value="{{ $route->id }}" @if(old('route_id', $trip->route_id)==$route->id) selected @endif>
                            {{ $route->name }}
                        </option>
                    @endforeach
                </select>
                @error('route_id') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
            </div>

            <div class="col-md-6">
                <label class="form-label">Транспорт</label>
                <select name="transport_id" class="form-select @error('transport_id') is-invalid @enderror" value="{{ old('transport_id') }}">
                    <option style="display:none"></option>
                    @foreach($transports as $t)
                        <option value="{{ $t->id }}" @if(old('transport_id', $trip->transport_id)==$t->id) selected @endif>
                            {{ $t->name }}
                        </option>
                    @endforeach
                </select>
                @error('transport_id') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
            </div>

            <div class="col-md-6">
                <label class="form-label">Отправление</label>
                <input type="datetime-local" name="departure_at" class="form-control @error('departure_at') is-invalid @enderror"
                       value="{{ old('departure_at', $trip->departure_at?->format('Y-m-d\TH:i')) }}">
                @error('departure_at') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
            </div>

            <div class="col-md-6">
                <label class="form-label">Прибытие</label>
                <input type="datetime-local" name="arrival_at" class="form-control @error('arrival_at') is-invalid @enderror"
                       value="{{ old('arrival_at', $trip->arrival_at?->format('Y-m-d\TH:i')) }}">
                @error('arrival_at') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
            </div>

            <div class="col-12 d-flex justify-content-end">
                <button class="btn btn-warning px-4" type="submit">Сохранить</button>
            </div>
        </form>
    </div>
</div>
@endsection
