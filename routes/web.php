<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

Route::get('/', [EventController::class, 'index'])->name('events.index');
Route::resource('events', EventController::class);
Route::get('/about', [EventController::class, 'about'])->name('about');