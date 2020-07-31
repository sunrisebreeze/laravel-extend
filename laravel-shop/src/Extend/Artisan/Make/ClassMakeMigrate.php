<?php

namespace Sunriseqf\LaravelShop\Extend\Artisan\Make;

use Illuminate\Database\Console\Migrations\MigrateMakeCommand;


class ClassMakeMigrate extends MigrateMakeCommand
{
    use GeneratorCommand;

    protected $signature = 'shop:migration {name : The name of the migration}
        {--create= : The table to be created}
        {--table= : The table to migrate}
        {--path= : The location where the migration file should be created}
        {--realpath : Indicate any provided migration file paths are pre-resolved absolute paths}
        {--fullpath : Output the full path of the migration}';

    // 对应的源码地址是在 Illuminate\Database\Console\Migrations\MigrateMakeCommand::getMigrationPath()
    protected function getMigrationPath()
    {
        return $this->shopPath.'/'.$this->input->getOption('path').'/Database/'.'migrations';
    }
}