<!doctype html><html lang="ru"><head><meta charset="utf-8"><title>Маршрут</title></head>
<body>
@if(!$route) <h2>Маршрут не найден</h2>
@else
    <h2>{{ $route->name }}</h2>
    <p>Тариф: {{ $route->tariff_per_kg }} ₽/кг • Дистанция: {{ $route->distance_km }} км</p>

    <h3>Рейсы маршрута</h3>
    <table border="1" cellpadding="6">
        <tr><td>ID</td><td>Транспорт</td><td>Отправление</td><td>Прибытие</td></tr>
        @foreach($route->trips as $t)
            <tr>
                <td><a href="/trips/{{ $t->id }}">{{ $t->id }}</a></td>
                <td>{{ $t->transport?->name }}</td>
                <td>{{ $t->departure_at }}</td>
                <td>{{ $t->arrival_at }}</td>
            </tr>
        @endforeach
    </table>
@endif
</body></html>

