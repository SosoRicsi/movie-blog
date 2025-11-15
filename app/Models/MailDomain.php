<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MailDomain extends Model
{
    protected $fillable = [
        'name'
    ];

    public function mail_users(): HasMany
    {
        return $this->hasMany(MailUser::class, 'domain_id');
    }

    public function mail_aliases(): HasMany
    {
        return $this->hasMany(MailAlias::class, 'domain_id');
    }
}
