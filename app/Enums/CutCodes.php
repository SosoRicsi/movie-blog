<?php

namespace App\Enums;

enum CutCodes: string
{
    case FESTIVAL = 'festival';
    case DIRECTOR = 'director';
    case TV = 'tv';
    case AIRLINE = 'airline';
    case WEB = 'web';
    case OTHER = 'other';

    public function label(): string
    {
        return match ($this) {
            self::FESTIVAL => 'Festival cut',
            self::DIRECTOR => 'Director\'s cut',
            default => ucfirst($this->value)
        };
    }
}
