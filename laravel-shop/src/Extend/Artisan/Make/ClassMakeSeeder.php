<?php

namespace Sunriseqf\LaravelShop\Extend\Artisan\Make;

use Illuminate\Database\Console\Seeds\SeederMakeCommand as Commad;
use Symfony\Component\Console\Input\InputArgument;

class ClassMakeSeeder extends Commad
{
    use GeneratorCommand;

    protected $name = 'shop:seeder';

    protected function getPath($name)
    {
        return $this->shopPath.'/'.$this->getPackagePath().'/Database/seeds/'.$name.'.php';
    }
}
