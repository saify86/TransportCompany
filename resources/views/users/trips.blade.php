<!doctype html><html lang="ru"><head><meta charset="utf-8"><title>Пользователь → Рейсы (M2M)</title></head>
<body>
@if(!$user) <h2>Пользователь не найден</h2>
@else
    <h2>Рейсы пользователя: {{ $user->name }}</h2>
    <table border="1" cellpadding="6">
        <tr><td>ID рейса</td><td>Маршрут</td><td>Транспорт</td><td>Вес (pivot, кг)</td></tr>
        @foreach($user->tripsMany as $t)
            <tr>
                <td>{{ $t->id }}</td>
                <td>{{ $t->route?->name }}</td>
                <td>{{ $t->transport?->name }}</td>
                <td>{{ $t->pivot->weight_kg }}</td>
            </tr>
        @endforeach
    </table>
@endif
</body></html>



