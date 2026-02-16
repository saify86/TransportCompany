@extends('layout')
@section('title','Ошибка')

@section('content')
    <div class="tc-card p-4">
        <h1 class="h4 mb-2">Ошибка доступа</h1>
        <div class="text-warning mb-3">{{ $message }}</div>
        <a class="btn btn-outline-tc" href="{{ url()->previous() }}">Назад</a>
    </div>
@endsection


