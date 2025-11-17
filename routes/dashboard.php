<?php

use App\Http\Controllers\Dashboard\FilmController;
use App\Http\Controllers\Mails\MailUserController;
use Illuminate\Support\Facades\Route;

/* Route::resource('film', FilmController::class); */
Route::prefix('/film')->group(function () {
    Route::get('/create', [FilmController::class, 'create'])
        ->name('films.create')
        ->middleware('can:film.create');
});

Route::prefix('mails')->name('mails.')->group(function () {
    Route::resource('users', MailUserController::class)->except('show');
});
