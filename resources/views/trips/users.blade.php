<!doctype html><html lang="ru"><head><meta charset="utf-8"><title>Рейс → Пользователи (M2M)</title></head>
<body>
@if(!$trip) <h2>Рейс не найден</h2>
@else
    <h2>Пользователи рейса #{{ $trip->id }}</h2>
    <table border="1" cellpadding="6">
        <tr><td>Пользователь</td><td>Вес (pivot, кг)</td></tr>
        @foreach($trip->usersMany as $u)
            <tr>
                <td>{{ $u->name }}</td>
                <td>{{ $u->pivot->weight_kg }}</td>
            </tr>
        @endforeach
    </table>
@endif
</body></html>

