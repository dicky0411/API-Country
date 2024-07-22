<?php

use App\Http\Controllers\CountryController;
use Illuminate\Support\Facades\Route;

Route::get('/{code}', [CountryController::class, 'show']);
Route::get('/greeting/{name}', [CountryController::class, 'greeting']);

Route::get('/', function () {
    return view('welcome');
});
