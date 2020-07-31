<?php

namespace Sunriseqf\LaravelExtend\Swoole\Facades;

use Illuminate\Support\Facades\Facade;

class Swoole extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'swoole.server';
    }
}
