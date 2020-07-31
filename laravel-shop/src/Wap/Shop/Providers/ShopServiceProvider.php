<?php

namespace Sunriseqf\LaravelShop\Wap\Shop\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;

class ShopServiceProvider extends ServiceProvider
{
    public function register()
    {

        //  加载shop的路由配置文件
        $this->registerRoutes();

        //  加载组件shop的config配置文件
        $this->mergeConfigFrom(__DIR__.'/../Config/shop.php', "wap.shop");

        //  根据配置文件去加载auth信息
        $this->loadMemberAuthConfig();


        $this->loadViewsFrom(
            __DIR__.'/../Resources/views', 'wap.shop'
        );

        $this->registerPublishing();

    }

    public function boot()
    {
//        dd(app('view')->getFinder()->getHints());
    }



    //  迁移静态文件
    public function registerPublishing()
    {
        //  判断是否在命令行中执行
        if ($this->app->runningInConsole()) {
            $this->publishes([__DIR__.'/../Resources/assets' => public_path('vendor/sunrise/laravel-wap-shop')], 'laravel-shop-wap-shop=assets');
        }
    }


    //  根据配置文件去加载auth信息
    protected function loadMemberAuthConfig()
    {
        config(Arr::dot(config('wap.shop.wechat', []), 'wechat.'));
    }


    //  访问路由的默认控制器配置
    private function routeConfiguration()
    {
        return [
            'namespace' => 'Sunriseqf\LaravelShop\Wap\Shop\Http\Controllers',
            'prefix' => 'wap/shop',
            'middleware' => 'web'
        ];
    }

    //  加载路由文件
    private function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__.'/../Http/routes.php');
        });
    }
}
