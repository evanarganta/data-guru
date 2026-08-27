<?php

use App\Http\Controllers\GuruController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('guru.index'));
Route::resource('guru', GuruController::class);
