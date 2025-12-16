@extends('layouts.app')

@section('title', 'Рейс → Пользователи')

@section('content')
@if(!$trip)
    <div class="alert alert-danger">Рейс не найден</div>
@else
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <p class="text-uppercase text-warning fw-semibold mb-1">Рейс #{{ $trip->id }}</p>
            <h1 class="h4 mb-0">Пользователи и грузы</h1>
        </div>
        <a class="btn btn-outline-light" href="/trips/{{ $trip->id }}">Назад</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            @if($trip->usersMany->isEmpty())
                <p class="text-muted mb-0">Нет связанных пользователей.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-dark table-striped align-middle mb-0">
                        <thead>
                        <tr><td>Пользователь</td><td>Вес (pivot, кг)</td></tr>
                        </thead>
                        <tbody>
                        @foreach($trip->usersMany as $u)
                            <tr>
                                <td>{{ $u->name }}</td>
                                <td>{{ $u->pivot->weight_kg }}</td>
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
