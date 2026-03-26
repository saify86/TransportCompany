<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\TripControllerApi;
use App\Http\Controllers\RouteControllerApi;
use App\Http\Controllers\TransportControllerApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/trip', [TripControllerApi::class, 'index']);
Route::get('/trip/{id}', [TripControllerApi::class, 'show']);
Route::get('/route', [RouteControllerApi::class, 'index']);
Route::get('/route/{id}', [RouteControllerApi::class, 'show']);
Route::get('/transport', [TransportControllerApi::class, 'index']);
Route::get('/transport/{id}', [TransportControllerApi::class, 'show']);


