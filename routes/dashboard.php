<?php

use App\Http\Controllers\Dashboard\FilmController;
use Illuminate\Support\Facades\Route;

/* Route::resource('film', FilmController::class); */
Route::prefix('/film')->group(function () {
    Route::get('/create', [FilmController::class, 'create'])
        ->name('films.create')
        ->middleware('can:film.create');
});
