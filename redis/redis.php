<?php
require 'vendor/autoload.php';

$predis = new Predis\Client(['tcp://192.168.98.12:6379?alias=master','tcp://192.168.98.13:6379?alias=slave'],[
    'replication' => true,
    'parameters' => [
        'password' => '123456',
    ],
]);


var_dump($predis->get('abc'));