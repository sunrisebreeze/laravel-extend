<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class Test extends Controller
{
    public function index()
    {
//        dd(app());

        $this->G('t');
        //  没开启管道  18035.1ms

        for ($i=0; $i < 100000 ; $i++) {
            redis::set("test_{$i}", pow($i, 2));
            redis::get('test_{$i}');
        }


        //  开启管道    1223.1ms
//        Redis::pipeline(function ($pipe) {
//            for ($i = 0; $i < 100000; $i++) {
//                $pipe->set("key:$i", $i);
//            }
//        });
        $this->G('t','r');
    }

    public function G($start,$end='',$dec=4)
    {
        static $_info = array();
        if (!empty($end))
        {
            if(!isset($_info[$end])) $_info[$end] = microtime(TRUE);
            $sconds = number_format(($_info[$end]-$_info[$start]), $dec) * 1000;
            echo "{$sconds}ms<br />";
        }
        else
        {
            $_info[$start] = microtime(TRUE);
        }
    }
}
