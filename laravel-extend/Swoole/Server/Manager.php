<?php

namespace Sunriseqf\LaravelExtend\Swoole\Server;

use Illuminate\Contracts\Container\Container;
use Sunriseqf\LaravelExtend\Swoole\Http\SRequest;
use Sunriseqf\LaravelExtend\Swoole\Http\SResponse;

class Manager
{
    /**
     * laravel框架
     * @var \Illuminate\Foundation\Application
     */
    protected $laravel;

    protected $server;
    //  保存swoole的事件所对应本类的方法
    protected $events = [ 
        'request' => 'onRequest'
    ];

    //  初始化
    public function __construct(Container $laravel )
    {
        $this->laravel = $laravel;
        $this->server = $this->laravel->make('swoole.server');

        $this->setSwooleServerEvent();
    }

    //  执行swolle事件
    protected function setSwooleServerEvent()
    {
        foreach ($this->events as $event => $func) {
            $this->server->on($event, [$this, $func]);
        }


    }
    /**
     * 'onRequest' event
     * @param  \Swoole\Http\Request $swooleRequest
     * @param  \Swoole\Http\Response $swooleResponse
     */
    public function onRequest($swooleRequest, $swooleResponse)
    {


        $kernel = $this->laravel['Illuminate\Contracts\Http\Kernel'];
        $response = $kernel->handle(
            $request = SRequest::make($swooleRequest)
        );

        SResponse::make($response,$swooleResponse)->send();
        $kernel->terminate($request, $response);
    }

    protected function onStart()
    {

    }

    public function run()
    {
        $this->server->start();
    }
}
