<?php
class Http
{
    /**
     * swoole http server
     * @var Swoole/Http/Server
     */
    protected $server;
    protected $test;
    function __construct()
    {
        $this->server = new \Swoole\Http\Server('192.168.98.12', 5300);
        $this->test = 'test';
        $this->server->on('request', [$this, 'onRequest']);
    }
    public function onRequest($request, $response)
    {
        var_dump($request->get, $request->post);
        var_dump($this->test);
        $response->header("Content-Type", "text/html; charset=utf-8");
        $response->end("<h1>Hello Swoole. #1234"."</h1>");
    }
    public function run()
    {
        $this->server->start();
    }
}
$http = new Http();
$http->run();
