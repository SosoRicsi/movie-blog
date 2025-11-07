<?php

namespace App\Models;

use App\Enums\PeopleType;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Person extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'full_name',
        'email',
        'website',
        'instagram',
        'phone',
        'city',
        'slug',
        'bio_short',
        'bio',
        'birth_date',
        'type',
        'user_id',
    ];

    protected function casts(): array
    {
        return [
            'type' => PeopleType::class,
            'birth_date' => 'date',
        ];
    }

    protected static function booted(): void
    {
        static::saving(function (Person $person) {
            if (empty($person->slug) || $person->isDirty('full_name')) {
                $person->slug = Str::slug($person->full_name);
            }
        });
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
