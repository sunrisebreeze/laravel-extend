<?php

namespace Sunriseqf\LaravelShop\Extend\Artisan;

use Illuminate\Support\ServiceProvider;

class ArtisanServiceProvider extends ServiceProvider
{

    protected $commands = [
        Make\ClassMake::class,
        Make\ClassMakeModel::class,
        Make\ClassMakeController::class,
        Make\ClassMakeMigrate::class,
        Make\ClassMakeObserver::class,
        Make\ClassMakeSeeder::class,
    ];

    public function register()
    {
        $this->commands($this->commands);
    }

    public function boot()
    {

    }
}
