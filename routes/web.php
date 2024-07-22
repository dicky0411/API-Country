<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController;

Route::get('/{code}', [CountryController::class, 'show']);

Route::get('/', function () {
    return view('welcome');
});
