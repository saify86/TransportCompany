@extends('layouts.app')

@section('title', 'Пользователь → Рейсы')

@section('content')
@if(!$user)
    <div class="alert alert-danger">Пользователь не найден</div>
@else
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <p class="text-uppercase text-warning fw-semibold mb-1">Пользователь</p>
            <h1 class="h4 mb-0">{{ $user->name }}</h1>
            <p class="text-secondary mb-0">Рейсы пользователя</p>
        </div>
        <a class="btn btn-outline-light" href="/users">К списку пользователей</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            @if($user->tripsMany->isEmpty())
                <p class="text-muted mb-0">Нет связанных рейсов.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-dark table-striped align-middle mb-0">
                        <thead>
                        <tr><td>ID рейса</td><td>Маршрут</td><td>Транспорт</td><td>Вес (pivot, кг)</td></tr>
                        </thead>
                        <tbody>
                        @foreach($user->tripsMany as $t)
                            <tr>
                                <td>{{ $t->id }}</td>
                                <td>{{ $t->route?->name }}</td>
                                <td>{{ $t->transport?->name }}</td>
                                <td>{{ $t->pivot->weight_kg }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endif
@endsection
