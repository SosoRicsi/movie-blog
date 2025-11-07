<?php

namespace App\Enums;

enum FilmStatus: string
{
    case UNDER_FILMING = 'under_filming';
    case PREPARATIONS = 'preparations';
    case POST_PRODUCTION = 'post_production';
    case RELEASED = 'released';
    case FESTIVAL = 'festival';
    case CANCELED = 'canceled';
    case PLANNING = 'planning';
    case DELAYED = 'delayed';

    public function color(): string
    {
        return match ($this) {
            self::UNDER_FILMING     => 'blue',
            self::PREPARATIONS      => 'yellow',
            self::POST_PRODUCTION   => 'orange',
            self::RELEASED          => 'green',
            self::FESTIVAL          => 'rose',
            self::CANCELED          => 'red',
            self::DELAYED           => 'purple',
            self::PLANNING          => 'lime',
        };
    }
}
