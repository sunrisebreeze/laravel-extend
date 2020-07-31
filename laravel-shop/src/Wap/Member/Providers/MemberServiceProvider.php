<?php
namespace Sunriseqf\LaravelShop\Wap\Member\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;
use EasyWeChat\OfficialAccount\Application as OfficialAccount;

class MemberServiceProvider extends ServiceProvider
{
    protected $middlewareGroups = [];
    protected $routeMiddleware = [
        'wechat.oauth' => \Overtrue\LaravelWeChat\Middleware\OAuthAuthenticate::class,
    ];

    protected $commands = [
        \Sunriseqf\LaravelShop\Wap\Member\Console\Commands\InstallCommand::class,
    ];

    public function register()
    {
        $this->registerRoutes();
//        $this->loadViewsFrom(
//            __DIR__.'/../Resources/views', 'laravel-shop'
//        );
        $this->registerRouteMiddleware();


        //  加载config配置文件
        $this->mergeConfigFrom(__DIR__.'/../Configs/member.php', "wap.member");

        //  发布配置文件
        //  php artisan vendor:publish --provider="Sunriseqf\LaravelShop\Wap\Member\Providers\MemberServiceProvider"
        $this->registerPublishing();
        
        //  迁移数据库文件
        $this->loadMigrations();
    }

    public function boot()
    {
        //  根据配置文件去加载auth信息
        $this->loadMemberAuthConfig();

        //  加载自定义artisan文件
        $this->commands($this->commands);

        //  重新注册wechat服务，修改wechat配置加载信息
        $this->app->singleton("wechat.official_account.default", function ($laravelApp) {
            $app = new OfficialAccount(array_merge(config('wechat.defaults', []), config('wechat.official_account.default')));
            if (config('wechat.defaults.use_laravel_cache')) {
                $app['cache'] =  $laravelApp['cache.store'];
            }
            $app['request'] = $laravelApp['request'];
            return $app;
        });
    }
    
    //  迁移数据库文件
    public function loadMigrations()
    {
        if ($this->app->runningInConsole())
        {
            $this->loadMigrationsFrom(__DIR__ . '/../Databases/migrations');
        }
    }
    
    //  发布配置文件
    public function registerPublishing()
    {
        //  判断是否在命令行中执行
        if ($this->app->runningInConsole()) {
            //                  [当前组件的配置文件路径 =》 这个配置复制那个目录] , 文件标识
            // 1. 不填就是默认的地址 config_path 的路径 发布配置文件名不会改变
            // 2. 不带后缀就是一个文件夹
            // 3. 如果是一个后缀就是一个文件
            $this->publishes([__DIR__.'/../Configs' => config_path('wap')], 'laravel-shop-wap-member-config');
        }
    }

    //  根据配置文件去加载auth信息
    protected function loadMemberAuthConfig()
    {
        config(Arr::dot(config('wap.member.auth', []), 'auth.'));
        config(Arr::dot(config('wap.member.wechat', []), 'wechat.'));
    }

    //  加载自定义中间件数组
    protected function registerRouteMiddleware()
    {
        foreach ($this->middlewareGroups as $key => $middleware) {
            $this->app['router']->middlewareGroup($key, $middleware);
        }

        foreach ($this->routeMiddleware as $key => $middleware) {
            $this->app['router']->aliasMiddleware($key, $middleware);
        }
    }

    //  route
    private function routeConfiguration()
    {
        return [
            'namespace' => 'Sunriseqf\LaravelShop\Wap\Member\Http\Controllers',
            'prefix' => 'wap/member',
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
