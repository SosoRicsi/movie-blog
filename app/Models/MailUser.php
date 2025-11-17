<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

class MailUser extends Model
{
    use Notifiable;

    protected $fillable = [
        'domain_id',
        'local_part',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    protected function password(): Attribute
    {
        return Attribute::make(
            set: function (string $value) {
                if (str_starts_with($value, '{BLF-CRYPT}$2y$')) {
                    return $value;
                }

                $hash = password_hash($value, PASSWORD_BCRYPT, [
                    'cost' => 5,
                ]);

                return '{BLF-CRYPT}'.$hash;
            }
        );
    }

    public function routeNotificationForMail($notification): string
    {
        return $this->local_part.'@'.$this->domain->name;
    }

    public function domain(): BelongsTo
    {
        return $this->belongsTo(MailDomain::class, 'domain_id');
    }
}
