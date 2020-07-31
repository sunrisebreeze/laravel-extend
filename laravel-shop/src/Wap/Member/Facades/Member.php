<?php
namespace Sunriseqf\LaravelShop\Wap\Member\Facades;

use Illuminate\Support\Facades\Facade;

class Member extends Facade
{
    public static function getFacadeAccessor()
    {
        return \Sunriseqf\LaravelShop\Wap\Member\Member::class;
    }
}