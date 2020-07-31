<?php

namespace Sunriseqf\LaravelShop\Extend\Artisan\Make;

use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputArgument;
trait GeneratorCommand
{
    protected $shopPath = __DIR__ . '/../../..';
    protected $rootNamespace = 'Sunriseqf\LaravelShop';

    //  开头命名空间
    protected function rootNamespace()
    {
        return 'Sunriseqf\LaravelShop';
    }

    //  获取文件路径
    protected function getPath($name)
    {
        $name = Str::replaceFirst($this->rootNamespace(), '', $name);
        return $this->shopPath.'/'.str_replace('\\', '/', $name).'.php';
    }

    //  获取package命令内容
    protected function getPackagePath()
    {
        return  str_replace('/','\\',trim('\\' . $this->argument('package'))) ;
    }

    //  命名空间
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . $this->getPackagePath() . '\\' . $this->FilePathType;
    }

    //  自定义命令
    protected function getArguments()
    {
        return [
            ['package', InputArgument::REQUIRED, 'The package of the class'],
            ['name', InputArgument::REQUIRED, 'The name of the class'],
        ];
    }
}