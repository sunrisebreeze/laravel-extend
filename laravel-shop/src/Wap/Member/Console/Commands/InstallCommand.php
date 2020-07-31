<?php

namespace Sunriseqf\LaravelShop\Wap\Member\Console\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wap-member:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //  php artisan make:migrate
        $this->call('migrate');

        //   php artisan vendor:publish --provider="Sunriseqf\LaravelShop\Wap\Member\Providers\MemberServiceProvider"
        $this->call('vendor:publish',[
            "--provider" => "Sunriseqf\LaravelShop\Wap\Member\Providers\MemberServiceProvider"
        ]);
    }
}
