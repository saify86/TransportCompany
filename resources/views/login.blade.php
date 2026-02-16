@extends('layout')
@section('title','Вход')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="tc-card p-4">
                <h1 class="h4 mb-3">Вход в систему</h1>
                <form method="post" action="{{ route('auth') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">E-mail</label>
                        <input class="form-control" name="email" value="{{ old('email') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Пароль</label>
                        <input class="form-control" type="password" name="password">
                    </div>
                    <button class="btn btn-tc w-100" type="submit">Войти</button>
                </form>
                @error('error')
                <div class="alert alert-danger tc-card mt-3">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
@endsection


