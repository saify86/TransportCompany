<!doctype html><html lang="ru"><head><meta charset="utf-8"><title>Рейс</title></head>
<body>
@if(!$trip) <h2>Рейс не найден</h2>
@else
    <h2>Рейс #{{ $trip->id }}</h2>
    <p><b>Маршрут:</b> {{ $trip->route?->name }}</p>
    <p><b>Транспорт:</b> {{ $trip->transport?->name }} ({{ $trip->transport?->capacity_kg }} кг)</p>
    <p><b>Суммарный вес грузов:</b> {{ $trip->total_cargo_weight_kg ?? 0 }} кг</p>

    <h3>Грузы и заказчики</h3>
    <table border="1" cellpadding="6">
        <tr><td>ID груза</td><td>Вес, кг</td><td>Заказчик</td></tr>
        @foreach($trip->cargo as $c)
            <tr>
                <td>{{ $c->id }}</td>
                <td>{{ $c->weight_kg }}</td>
                <td>{{ $c->user?->name }}</td>
            </tr>
        @endforeach
    </table>
@endif
</body></html>


