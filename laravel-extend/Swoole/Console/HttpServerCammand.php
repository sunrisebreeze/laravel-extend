<?php

namespace Sunriseqf\LaravelExtend\Swoole\Console;

use Illuminate\Console\Command;

class HttpServerCammand extends Command
{
    protected $signature = 'extend:swoole {action : start|stop|restart|reload|infos}';

    protected $description = 'Command description';
    protected $manage;
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->manage = $this->laravel->make('swoole.manage');
        $this->execution();
    }

    protected function execution()
    {
        return $this->{$this->argument('action')}();
    }

    protected function start()
    {
        $this->manage->run();
    }
    protected function stop()
    {
        
        return 'stop';
    }
    protected function restart()
    {
        return 'restart';
    }
    protected function reload()
    {
        return 'reload';
    }
    protected function infos()
    {
        return 'infos';
    }
}
