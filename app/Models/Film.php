<?php

namespace App\Models;

use App\Enums\FilmStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Film extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'year',
        'status',
        'duration_minutes',
        'average_rating',
        'poster_path',
        'cover_path',
        'primary_language',
    ];

    protected function casts(): array
    {
        return [
            'status' => FilmStatus::class,
            'primary_language' => 'enum'
        ];
    }

    public function translations(): HasMany
    {
        return $this->hasMany(FilmTranslation::class);
    }

    public function versions(): HasMany
    {
        return $this->hasMany(FilmVersion::class);
    }

}
