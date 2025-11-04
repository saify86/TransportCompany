<!doctype html>
<html lang="ru">
<head><meta charset="utf-8"><title>Редактировать рейс</title>
    <style>.is-invalid{color:red}</style></head>
<body>
<h2>Редактирование рейса #{{ $trip->id }}</h2>

<form method="post" action="{{ url('/trips/update/'.$trip->id) }}">
    @csrf

    <label>Маршрут:</label>
    <select name="route_id" value="{{ old('route_id') }}">
        <option style="display:none"></option>
        @foreach($routes as $route)
            <option value="{{ $route->id }}"
                    @if(old('route_id', $trip->route_id)==$route->id) selected @endif>
                {{ $route->name }}
            </option>
        @endforeach
    </select>
    @error('route_id') <div class="is-invalid">{{ $message }}</div> @enderror
    <br><br>

    <label>Транспорт:</label>
    <select name="transport_id" value="{{ old('transport_id') }}">
        <option style="display:none"></option>
        @foreach($transports as $t)
            <option value="{{ $t->id }}"
                    @if(old('transport_id', $trip->transport_id)==$t->id) selected @endif>
                {{ $t->name }}
            </option>
        @endforeach
    </select>
    @error('transport_id') <div class="is-invalid">{{ $message }}</div> @enderror
    <br><br>

    <label>Отправление:</label>
    <input type="datetime-local" name="departure_at"
           value="{{ old('departure_at', $trip->departure_at?->format('Y-m-d\TH:i')) }}">
    @error('departure_at') <div class="is-invalid">{{ $message }}</div> @enderror
    <br><br>

    <label>Прибытие:</label>
    <input type="datetime-local" name="arrival_at"
           value="{{ old('arrival_at', $trip->arrival_at?->format('Y-m-d\TH:i')) }}">
    @error('arrival_at') <div class="is-invalid">{{ $message }}</div> @enderror
    <br><br>

    <input type="submit" value="Сохранить">
</form>

</body>
</html>

