<?php

namespace App\Models;

use App\Enums\{FilmLanguages, FilmStatus};
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

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
            'primary_language' => FilmLanguages::class,
            'average_rating' => 'decimal:1',
            'year' => 'integer',
            'duration_minutes' => 'integer',
        ];
    }

    protected static function booted(): void
    {
        static::saving(function (Film $film) {
            if (empty($film->slug) || $film->isDirty('title')) {
                $film->slug = Str::slug($film->title);
            }
        });
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function primaryVersion(): ?FilmVersion
    {
        return $this->versions()->where('is_primary', true)->first();
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
