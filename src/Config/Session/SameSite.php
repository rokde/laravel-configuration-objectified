<?php

namespace Rokde\LaravelConfigurationObjectified\Config\Session;

enum SameSite: string
{
    case LAX = 'lax';
    case STRICT = 'strict';
    case NONE = 'none';
}
