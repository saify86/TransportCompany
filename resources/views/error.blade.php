@extends('layouts.app')

@section('title', 'Ошибка доступа')

@section('content')
<div class="card shadow-sm">
    <div class="card-body d-flex justify-content-between align-items-center">
        <div>
            <p class="text-uppercase text-warning fw-semibold mb-1">Ошибка</p>
            <h1 class="h4 mb-0">{{ $message }}</h1>
        </div>
        <a class="btn btn-outline-light" href="{{ url()->previous() }}">Назад</a>
    </div>
</div>
@endsection
