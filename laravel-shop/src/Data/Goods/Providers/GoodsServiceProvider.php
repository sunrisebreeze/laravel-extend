<?php

namespace Sunriseqf\LaravelShop\Data\Goods\Providers;

use Illuminate\Support\Arr;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Sunriseqf\LaravelShop\Data\Goods\Models\Category;
use Sunriseqf\LaravelShop\Data\Goods\Observers\CategoryObserver;

class GoodsServiceProvider extends ServiceProvider
{
    public function register()
    {

        $this->registerRoutes();

        $this->registerMigrations();

        //  加载Goods的config配置文件
        $this->mergeConfigFrom(__DIR__.'/../Config/goods.php', "data.goods");
        $this->loadGoodsConfig();
    }

    public function boot()
    {
        Category::observe(CategoryObserver::class);
    }


    public function loadGoodsConfig()
    {
        // 根据默认连接的信息去database.php配置分属于goods组件的连接信息
       config(
           Arr::dot(
               config('database.connections.'.config('data.goods.database.connection.type'), []),
               'database.connections.'.config('data.goods.database.connection.name').'.'
           )
       );

        // 在把goods组件的单独信息 放到 database中的goods连接的信息
        config(
            Arr::dot(
                config('data.goods.database.'.config('data.goods.database.connection.name'), []),
                'database.connections.'.config('data.goods.database.connection.name').'.'
            )
        );
    }


    private function registerMigrations()
    {
        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(__DIR__.'/../Database/migrations');
        }
    }

    //  route
    private function routeConfiguration()
    {
        return [
            'namespace' => 'Sunriseqf\LaravelShop\Data\Goods\Http\Controllers',
            'prefix' => 'wap/goods',
            'middleware' => 'web'
        ];
    }

    //  route
    private function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__.'/../Http/routes.php');
        });
    }
}
