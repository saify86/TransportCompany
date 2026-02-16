<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{RouteController, TripController};
use App\Http\Controllers\TransportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
Route::get('/', function () {
    return view('home');
});
Route::get('/hello', function () {
    return view('hello', ['title' => 'Hello World!']);
});
Route::get('/routes',       [RouteController::class, 'index'])->middleware('auth');
Route::get('/routes/{id}',  [RouteController::class, 'show'])->middleware('auth');
Route::get('/routes/{id}/transports',  [RouteController::class, 'showTransportsM2M'])->middleware('auth');
Route::get('/transports/{id}/routes',  [TransportController::class, 'showRoutesM2M'])->middleware('auth');
Route::get('/trips/{id}/users',        [TripController::class, 'showUsersM2M'])->middleware('auth');
Route::get('/users/{id}/trips',        [UserController::class, 'showTripsM2M'])->middleware('auth');

Route::get('/trips',        [TripController::class, 'index'])->middleware('auth');
Route::get('/trips/create',         [TripController::class, 'create'])->middleware('auth');
Route::post('/trips',               [TripController::class, 'store'])->middleware('auth');
Route::get('/trips/edit/{id}',      [TripController::class, 'edit'])->middleware('auth');
Route::post('/trips/update/{id}',   [TripController::class, 'update'])->middleware('auth');
Route::get('/trips/destroy/{id}',   [TripController::class, 'destroy'])->middleware('auth');
Route::get('/trips/{id}',   [TripController::class, 'show'])->middleware('auth');

Route::get('/session', fn() => response()->json(session()->all()));

Route::get('/login', [LoginController::class, 'login'])
    ->name('login');

Route::post('/auth', [LoginController::class, 'authenticate'])
    ->name('auth');

Route::get('/logout', [LoginController::class, 'logout'])
    ->name('logout');
Route::get('/error', function () {return view('error', ['message' => session('message'),]);})
    ->name('error');
