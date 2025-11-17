<?php

use App\Models\Film;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mails\MailUserController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'projects' => [
            [
                'id' => 1,
                'title' => 'Éjszakai Fények',
                'category' => [
                    'id' => 1,
                    'title' => 'Játékfilm',
                ],
                'status' => [
                    'title' => 'Forgatás alatt',
                    'color' => 'text-blue-400',
                ],
                'image' => [
                    'url' => 'https://placehold.co/800x600',
                    'placeholder' => 'Placeholder image',
                ],
                'description' => 'Egy magányos detektív története a nagyvárosi éjszakában.',
            ],
            [
                'id' => 2,
                'title' => 'Horizont',
                'category' => [
                    'id' => 2,
                    'title' => 'Dokumentumfilm',
                ],
                'status' => [
                    'title' => 'Utómunka',
                    'color' => 'text-green-400',
                ],
                'image' => [
                    'url' => 'https://placehold.co/800x600',
                    'placeholder' => 'Placeholder image',
                ],
                'description' => 'Utazás a Kárpátok legszebb tájain keresztül.',
            ],
            [
                'id' => 3,
                'title' => 'Visszhang',
                'category' => [
                    'id' => 3,
                    'title' => 'Rövidfilm',
                ],
                'status' => [
                    'title' => 'Előkészítés',
                    'color' => 'text-orange-400',
                ],
                'image' => [
                    'url' => 'https://placehold.co/800x600',
                    'placeholder' => 'Placeholder image',
                ],
                'description' => 'Kísérleti film a hang és a csend kapcsolatáról.',
            ],
        ],
        'blog_posts' => [
            [
                'id' => 1,
                'title' => 'A modern filmkészítés kihívásai 2025-ben',
                'excerpt' => 'Hogyan változtatja meg a mesterséges intelligencia és az új technológiák a filmipart?',
                'date' => '2025. március 15.',
                'category' => [
                    'id' => 1,
                    'title' => 'Technológia',
                ],
                'image' => [
                    'url' => 'https://placehold.co/600x400',
                    'placeholder' => 'Placeholder image',
                ],
                'read_time' => 5,
                'user' => [
                    'id' => 1,
                    'name' => 'Kis Pista',
                    'email' => 'kis.pista@banana.joe',
                    'created_at' => '2025. január. 20',
                ],
                'created_at' => '2025. március 10.',
                'updated_at' => '2025. március 10.',
            ],
            [
                'id' => 2,
                'title' => 'Kulisszák mögött: Éjszakai Fények forgatása',
                'excerpt' => 'Betekintés a legújabb játékfilmünk készítésének folyamatába és a kreatív döntések mögé.',
                'date' => '2025. március 10.',
                'category' => [
                    'id' => 1,
                    'title' => 'Kulisszák mögött',
                ],
                'image' => [
                    'url' => 'https://placehold.co/600x400',
                    'placeholder' => 'Placeholder image',
                ],
                'read_time' => 8,
                'user' => [
                    'id' => 1,
                    'name' => 'Kis Pista',
                    'email' => 'kis.pista@banana.joe',
                    'created_at' => '2025. január. 20',
                ],
                'created_at' => '2025. március 8.',
                'updated_at' => '2025. március 8.',
            ],
            [
                'id' => 3,
                'title' => 'Interjú a rendezővel: Vízió és valóság',
                'excerpt' => 'Beszélgetés a stúdió alapítójával a filmkészítés művészetéről és a jövő terveiről.',
                'date' => '2025. március 5.',
                'category' => [
                    'id' => 1,
                    'title' => 'Interview',
                ],
                'image' => [
                    'url' => 'https://placehold.co/600x400',
                    'placeholder' => 'Placeholder image',
                ],
                'read_time' => 8,
                'user' => [
                    'id' => 1,
                    'name' => 'Kis Pista',
                    'email' => 'kis.pista@banana.joe',
                    'created_at' => '2025. január. 20',
                ],
                'created_at' => '2025. február 19.',
                'updated_at' => '2025. február 19.',
            ],
        ],
    ]);
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard', [
        'films_count' => Film::all()->count(),
    ]);
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/settings.php';
require __DIR__.'/dashboard.php';
require __DIR__.'/auth.php';
