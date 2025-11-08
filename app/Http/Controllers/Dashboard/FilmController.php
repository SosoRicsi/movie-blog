<?php

namespace App\Http\Controllers\Dashboard;

use App\Enums\FilmLanguages;
use App\Enums\FilmStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Film\CreateFilmRequest;
use App\Models\Film;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return Inertia::render('dashboard/films/CreateFilm', [
            'available_statuses' => array_map(fn ($e) => ['status' => $e->value, 'color' => $e->color()], FilmStatus::cases()),
            'available_languages' => array_map(fn ($e) => $e->value, FilmLanguages::cases()),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateFilmRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Film $film)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Film $film)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Film $film)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Film $film)
    {
        //
    }
}
