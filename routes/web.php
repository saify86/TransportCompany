<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{RouteController, TripController};
use App\Http\Controllers\TransportController;
use App\Http\Controllers\UserController;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/hello', function () {
    return view('hello', ['title' => 'Hello World!']);
});
Route::get('/routes',       [RouteController::class, 'index']);
Route::get('/routes/{id}',  [RouteController::class, 'show']);
Route::get('/routes/{id}/transports',  [RouteController::class, 'showTransportsM2M']);
Route::get('/transports/{id}/routes',  [TransportController::class, 'showRoutesM2M']);
Route::get('/trips/{id}/users',        [TripController::class, 'showUsersM2M']);
Route::get('/users/{id}/trips',        [UserController::class, 'showTripsM2M']);

Route::get('/trips',        [TripController::class, 'index']);
Route::get('/trips/create',         [TripController::class, 'create']);
Route::post('/trips',               [TripController::class, 'store']);
Route::get('/trips/edit/{id}',      [TripController::class, 'edit']);
Route::post('/trips/update/{id}',   [TripController::class, 'update']);
Route::get('/trips/destroy/{id}',   [TripController::class, 'destroy']);
Route::get('/trips/{id}',   [TripController::class, 'show']);
