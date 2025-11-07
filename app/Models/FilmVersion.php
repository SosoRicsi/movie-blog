<?php

namespace App\Models;

use App\Enums\{CutCodes, MasterTypes};
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FilmVersion extends Model
{

    protected $fillable = [
        'film_id',
        'name',
        'duration_minutes',
        'is_primary',
        'master_type',
        'cut_code',
        'vimeo_private_link',
        'vimeo_password',
    ];

    protected $hidden = [
        'vimeo_password'
    ];

    protected function casts(): array
    {
        return [
            'master_type' => MasterTypes::class,
            'cut_code' => CutCodes::class,
            'is_primary' => 'boolean',
            'duration_minutes' => 'integer',
            'vimeo_password' => 'encrypted:string'
        ];
    }

    protected $touches = [
        'film'
    ];

    public function film(): BelongsTo
    {
        return $this->belongsTo(Film::class);
    }

}
