<?php

use App\Http\Controllers\GuruController;
use Illuminate\Support\Facades\Route;

Route::get('/guru', [GuruController::class, 'api'])->name('api.guru.index');
