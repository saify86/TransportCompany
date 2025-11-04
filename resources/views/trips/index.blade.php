<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Рейсы</title>
    <style>
        .ok { color: green; margin: 10px 0; }
    </style>
</head>
<body>

<h2>Список рейсов</h2>

<p><a href="{{ url('/trips/create') }}">+ Создать рейс</a></p>

@if(session('ok'))
    <div class="ok">{{ session('ok') }}</div>
@endif

<table border="1" cellpadding="6">
    <tr>
        <td>ID</td>
        <td>Маршрут</td>
        <td>Транспорт</td>
        <td>Отправление</td>
        <td>Прибытие</td>
        <td>Сумма груза, кг</td>
        <td>Действия</td>
    </tr>
    @foreach($trips as $t)
        <tr>
            <td>{{ $t->id }}</td>
            <td>{{ $t->route?->name }}</td>
            <td>{{ $t->transport?->name }}</td>
            <td>{{ $t->departure_at }}</td>
            <td>{{ $t->arrival_at }}</td>
            <td>{{ $t->total_cargo_weight_kg ?? 0 }}</td>
            <td>
                <a href="{{ url('/trips/'.$t->id) }}">Открыть</a>
                &nbsp;|&nbsp;
                <a href="{{ url('/trips/edit/'.$t->id) }}">Редактировать</a>
                &nbsp;|&nbsp;
                <a href="{{ url('/trips/destroy/'.$t->id) }}"
                   onclick="return confirm('Удалить рейс #{{ $t->id }}?')">Удалить</a>
            </td>
        </tr>
    @endforeach
</table>

</body>
</html>


