<?php

namespace Sunriseqf\LaravelShop\Extend\Artisan\Make;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;

class ClassMake extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'shop:class {name}';

    protected $type = 'Class';

    protected $shopPath = __DIR__ . '/../../..';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    protected function getStub(){

        return __DIR__.'/stubs/class.stub';
    }


    protected function rootNamespace()
    {
        return 'Sunriseqf\LaravelShop';
    }

    protected function getPath($name)
    {

        $name = Str::replaceFirst($this->rootNamespace(), '', $name);
        return $this->shopPath.'/'.str_replace('\\', '/', $name).'.php';
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
//    public function handle()
//    {
//        //
//        var_dump('12321321');
//    }
}
