<?php

/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */

define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our application. We just need to utilize it! We'll simply require it
| into the script here so that we don't have to worry about manual
| loading any of our classes later on. It feels great to relax.
|
*/

require __DIR__.'/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Turn On The Lights
|--------------------------------------------------------------------------
|
| We need to illuminate PHP development, so let us turn on the lights.
| This bootstraps the framework and gets it ready for use, then it
| will load up this application so that we can run it and send
| the responses back to the browser and delight our users.
|
*/

$app = require_once __DIR__.'/../bootstrap/app.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request
| through the kernel, and send the associated response back to
| the client's browser allowing them to enjoy the creative
| and wonderful application we have prepared for them.
|
*/

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

//  laravel Http 请求的运行
//  $kernel  => App\Http\Kernel
$response = $kernel->handle(    //请求的执行  设计路由分发
    $request = Illuminate\Http\Request::capture()   //  请求对象的初始化
);
$response->send();
$kernel->terminate($request, $response);



//$swoole_laravel_server = new Swoole\Http\Server('192.168.98.12', 5300);
//$swoole_laravel_server->on('request', function($req_swoole, $res_swoole) use($kernel){
//    $_SERVER = [];
//    if (isset($req_swoole->server)) {
//        foreach ($req_swoole->server as $k => $v) {
//            $_SERVER[strtoupper($k)] = $v;
//        }
//    }
//    $_SERVER['argv'] = [];
//    if (isset($req_swoole->header)) {
//        foreach ($req_swoole->server as $k => $v) {
//            $_SERVER[strtoupper($k)] = $v;
//        }
//    }
//    $_GET = [];
//    if (isset($req_swoole->get)) {
//        foreach ($req_swoole->get as $k => $v) {
//            if($k == 's'){
//                $_GET[$k] = $v;
//            }else{
//                $_GET[strtoupper($k)] = $v;
//            }
//        }
//    }
//    $_POST =[];
//    if (isset($req_swoole->post)) {
//        foreach ($req_swoole->post as $k => $v) {
//            $_POST[strtoupper($k)] = $v;
//        }
//    }
//    $response = $kernel->handle(
//        $request = Illuminate\Http\Request::capture()
//    );
//    $res_swoole->end($response->getContent());
//    $kernel->terminate($request, $response);
//});
//$swoole_laravel_server->start();