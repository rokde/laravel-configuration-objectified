<?php

namespace Rokde\LaravelConfigurationObjectified\Config\Session;

enum SessionDriver: string
{
    case FILE = 'file';
    case COOKIE = 'cookie';
    case DATABASE = 'database';
    case APC = 'apc';
    case MEMCACHED = 'memcached';
    case REDIS = 'redis';
    case DYNAMODB = 'dynamodb';
    case ARRAY = 'array';
}
