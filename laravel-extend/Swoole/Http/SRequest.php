<?php

namespace Sunriseqf\LaravelExtend\Swoole\Http;
use Illuminate\Http\Request as LaravelRequest;
use Symfony\Component\HttpFoundation\Request as SymfonyRequest;
use Symfony\Component\HttpFoundation\ParameterBag;
use Swoole\Http\Request as SwooleRequest;

class SRequest
{

    //  重配置Laravel Request
    //  仿写Illuminate\Http\Request::capture()
    public static function ResetLaravelRequest($get,$post,$cookie,$files,$server)
    {
        LaravelRequest::enableHttpMethodParameterOverride();
        $request = new SymfonyRequest($get,$post,[],$cookie,$files,$server);

        if (0 === strpos($request->headers->get('CONTENT_TYPE'), 'application/x-www-form-urlencoded')
            && \in_array(strtoupper($request->server->get('REQUEST_METHOD', 'GET')), ['PUT', 'DELETE', 'PATCH'])
        ) {
            parse_str($request->getContent(), $data);
            $request->request = new ParameterBag($data);
        }
//
        return LaravelRequest::createFromBase($request);
    }

    //  设置参数
    public static function setRequestParameter(SwooleRequest $swooleRequest)
    {
        $server = [];

        if (isset($swooleRequest->server)) {
            foreach ($swooleRequest->server as $k => $v) {
                $server[strtoupper($k)] = $v;
            }
        } 
        $server['argv'] = [];
        if (isset($swooleRequest->header)) {
            foreach ($swooleRequest->server as $k => $v) {
                $server[strtoupper($k)] = $v;
            }
        }

        $get = $swooleRequest->get ?? [];
        $post = $swooleRequest->post ?? [];
        $cookie = $swooleRequest->cookie ?? [];
        $files = $swooleRequest->files ?? [];

        return [$get, $post, $cookie, $files, $server];
    }

    //  公共访问接口
    public static function make(SwooleRequest $swooleRequest)
    {
        return static::ResetLaravelRequest(...(static::setRequestParameter($swooleRequest)));
    }
}
