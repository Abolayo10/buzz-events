<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

Route::get('/', [EventController::class, 'index'])->name('events.index');
Route::get('/about', [EventController::class, 'about'])->name('about');

Route::middleware(['auth'])->group(function () {
    Route::post('/events', [EventController::class, 'store'])->name('events.store');
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
    Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');
    Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');
});

Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');

require __DIR__.'/auth.php';