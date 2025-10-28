<!doctype html><html lang="ru"><head><meta charset="utf-8"><title>Транспорт → Маршруты (M2M)</title></head>
<body>
@if(!$transport) <h2>Транспорт не найден</h2>
@else
    <h2>Маршруты транспорта: {{ $transport->name }}</h2>
    <table border="1" cellpadding="6">
        <tr><td>ID</td><td>Маршрут</td><td>Дистанция</td><td>Отпр.</td><td>Приб.</td></tr>
        @foreach($transport->routesMany as $r)
            <tr>
                <td>{{ $r->id }}</td>
                <td>{{ $r->name }}</td>
                <td>{{ $r->distance_km }}</td>
                <td>{{ $r->pivot->departure_at }}</td>
                <td>{{ $r->pivot->arrival_at }}</td>
            </tr>
        @endforeach
    </table>
@endif
</body></html>

