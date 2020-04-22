<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Fjord\User\Models\FjordUser;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;


class NewTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fjord-dev:new';

    /**
     * Branch we are working in.
     *
     * @var string
     */
    protected $branch = 'config-architecture';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //shell_exec('composer create-project --prefer-dist laravel/laravel test');
        $composer = json_decode(File::get(base_path('test/composer.json')), true);
        $composer['repositories'] = [
            [
                "type" => "path",
                "url" => "../packages/aw-studio/fjord",
                "symlink" => true
            ],
            [
                "type" => "path",
                "url" => "../packages/aw-studio/fjord-permissions",
                "symlink" => true
            ]
        ];
        File::put(base_path('test/composer.json'), json_encode($composer, JSON_PRETTY_PRINT));
        $commands = [
            'cd test',
            'php artisan key:generate',
            'composer require aw-studio/fjord-permissions aw-studio/fjord:dev-{$this->branch};'
        ];
        shell_exec(implode(';', $commands));
    }
}
