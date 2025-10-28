<!doctype html><html lang="ru"><head><meta charset="utf-8"><title>Рейсы</title></head>
<body>
<h2>Список рейсов</h2>
<table border="1" cellpadding="6">
    <tr><td>ID</td><td>Маршрут</td><td>Транспорт</td><td>Отправление</td><td>Прибытие</td><td>Сумма груза, кг</td><td></td></tr>
    @foreach($trips as $t)
        <tr>
            <td>{{ $t->id }}</td>
            <td>{{ $t->route?->name }}</td>
            <td>{{ $t->transport?->name }}</td>
            <td>{{ $t->departure_at }}</td>
            <td>{{ $t->arrival_at }}</td>
            <td>{{ $t->total_cargo_weight_kg ?? 0 }}</td>
            <td><a href="/trips/{{ $t->id }}">Открыть</a></td>
        </tr>
    @endforeach
</table>
</body></html>

