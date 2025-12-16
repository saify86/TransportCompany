@extends('layouts.app')

@section('title', 'Вход в систему')

@section('content')
@if($user)
    <div class="card shadow-sm">
        <div class="card-body d-flex justify-content-between align-items-center">
            <div>
                <p class="text-uppercase text-warning fw-semibold mb-1">Авторизация</p>
                <h1 class="h4 mb-0">Здравствуйте, {{ $user->name }}</h1>
            </div>
            <a class="btn btn-warning" href="{{ route('logout') }}">Выйти из системы</a>
        </div>
    </div>
@else
    <div class="mb-4">
        <p class="text-uppercase text-warning fw-semibold mb-1">Авторизация</p>
        <h1 class="h3 mb-0">Вход в систему</h1>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <form class="row g-3" method="post" action="{{ route('auth') }}">
                @csrf

                <div class="col-12">
                    <label class="form-label">E-mail</label>
                    <input type="text" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12">
                    <label class="form-label">Пароль</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                    @error('password')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                @error('error')
                <div class="col-12">
                    <div class="alert alert-danger mb-0">{{ $message }}</div>
                </div>
                @enderror

                <div class="col-12 d-flex justify-content-end">
                    <button class="btn btn-warning px-4" type="submit">Отправить</button>
                </div>
            </form>
        </div>
    </div>
@endif
@endsection
