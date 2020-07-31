<?php

namespace Sunriseqf\LaravelShop\Extend\Artisan\Make;

use Illuminate\Routing\Console\ControllerMakeCommand;
use Symfony\Component\Console\Input\InputArgument;


class ClassMakeController extends ControllerMakeCommand
{
    use GeneratorCommand;
    protected $name = 'shop:controller';
    protected $FileType = 'Http\\Controllers';

    protected function getStub()
    {
        return __DIR__.'/stubs/controller.plain.stub';
    }
}