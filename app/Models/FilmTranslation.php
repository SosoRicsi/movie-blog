<?php

namespace App\Models;

use App\Enums\FilmLanguages;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FilmTranslation extends Model
{

    protected $fillable = [
        'film_id',
        'locale',
        'title',
        'logline',
        'synopsis_md',
        'director_note_md',
    ];

    protected function casts(): array
    {
        return [
            'locale' => FilmLanguages::class
        ];
    }

    public function film(): BelongsTo
    {
        return $this->belongsTo(Film::class);
    }

}
