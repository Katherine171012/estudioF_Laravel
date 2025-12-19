<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SesionController;

Route::get('/', function () {
    return redirect()->route('sesions.index');
});

Route::resource('sesions', SesionController::class);
