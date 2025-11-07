<?php

namespace App\Enums;

enum PeopleType: string
{
    case ACTOR = 'actor';
    case CREW = 'crew';
    case INFLUENCER = 'influencer';
    case OTHER = 'other';
}
