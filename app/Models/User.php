<?php

namespace App\Models;

use App\Enums\FilmLanguages;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, HasRoles, Notifiable, SoftDeletes;

    protected ?string $plain_password = null;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar_path',
        'locale',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'locale' => FilmLanguages::class,
        ];
    }

    protected function password(): Attribute
    {
        return Attribute::make(
            set: function (string $value) {
                $this->plain_password = $value;

                return Hash::make($value);
            }
        );
    }

    protected static function booted(): void
    {
        static::saved(function (User $user) {
            if (! $user->wasChanged('password') || ! $user->plain_password) {
                return;
            }

            $plain = $user->plain_password;

            $user->mail_users()->each(function (MailUser $mail_user) use ($plain) {
                $mail_user['password'] = $plain;
                $mail_user->save();
            });

            $user->plain_password = null;
        });
    }

    public function getAvatarPathAttribute(?string $value): string
    {
        return $value ?? 'https://placehold.co/100x100?text=User';
    }

    public function mail_users(): HasMany
    {
        return $this->hasMany(MailUser::class);
    }
}
