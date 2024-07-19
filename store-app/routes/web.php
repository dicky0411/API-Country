<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController;

Route::get('countries', [CountryController::class, 'index']);
Route::get('countries/{id}', [CountryController::class, 'show']);
Route::post('countries', [CountryController::class, 'store']);
Route::put('countries/{id}', [CountryController::class, 'update']);
Route::delete('countries/{id}', [CountryController::class, 'destroy']);

Route::get('/', function () {
    return view('welcome');
});
