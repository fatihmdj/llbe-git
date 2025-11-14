<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaguController;

Route::get('/', function () {
    return redirect()->route('route_daftar_lagu.index');
});

// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('route_daftar_lagu', LaguController::class);