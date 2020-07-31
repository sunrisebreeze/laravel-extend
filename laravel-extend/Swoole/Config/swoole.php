<?php
return [
    'listen'                => [
        'ip'   => env('SWOOLE_LISTEN_IP', '192.168.98.12'),
        'port' => env('SWOOLE_LISTEN_PORT', 5300)
    ],
    // true : http_swoole | false : websocket_swoole
    'socket_type' => true,
    'http' => [

    ],
    'websocket' => [

    ]
];
