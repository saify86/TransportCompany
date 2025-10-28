<!doctype html><html lang="ru"><head><meta charset="utf-8"><title>Маршрут → Транспорты (M2M)</title></head>
<body>
@if(!$route) <h2>Маршрут не найден</h2>
@else
    <h2>Транспорты по маршруту: {{ $route->name }}</h2>
    <table border="1" cellpadding="6">
        <tr><td>ID</td><td>Название</td><td>Г/п, кг</td><td>Отпр.</td><td>Приб.</td></tr>
        @foreach($route->transportsMany as $t)
            <tr>
                <td>{{ $t->id }}</td>
                <td>{{ $t->name }}</td>
                <td>{{ $t->capacity_kg }}</td>
                <td>{{ $t->pivot->departure_at }}</td>
                <td>{{ $t->pivot->arrival_at }}</td>
            </tr>
        @endforeach
    </table>
@endif
</body></html>

