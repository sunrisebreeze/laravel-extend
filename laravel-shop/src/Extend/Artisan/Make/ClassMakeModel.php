<?php

namespace Sunriseqf\LaravelShop\Extend\Artisan\Make;

use Illuminate\Foundation\Console\ModelMakeCommand;
use Illuminate\Support\Str;

class ClassMakeModel extends ModelMakeCommand
{
    use GeneratorCommand;
    protected $name = 'shop:model';
    protected $FilePathType = 'Models';

    protected function createMigration()
    {
        $table = Str::plural(Str::snake(class_basename($this->argument('name'))));
        if ($this->option('pivot'))
        {
            $table = Str::singular($table);
        }
        $this->call('shop:migration', [
            'name' => "create_{$table}_table",
            '--create' => $table,
            '--path' => $this->getPackagePath()
        ]);
    }
}