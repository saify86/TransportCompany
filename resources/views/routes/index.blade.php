<!doctype html><html lang="ru"><head><meta charset="utf-8"><title>Маршруты</title></head>
<body>
<h2>Маршруты</h2>
<table border="1" cellpadding="6">
    <tr><td>ID</td><td>Наименование</td><td>Тариф/кг</td><td>Дистанция</td><td></td></tr>
    @foreach($routes as $r)
        <tr>
            <td>{{ $r->id }}</td><td>{{ $r->name }}</td>
            <td>{{ $r->tariff_per_kg }}</td><td>{{ $r->distance_km }}</td>
            <td><a href="/routes/{{ $r->id }}">Открыть</a></td>
        </tr>
    @endforeach
</table>
</body></html>

