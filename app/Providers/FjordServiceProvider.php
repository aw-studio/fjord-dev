<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class FjordServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        fjord()->addLangPath(resource_path('lang/'));
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        fjord()
            ->package('aw-studio/fjord-permissions')
            ->extend('permissions')
            ->add('buttons', 'playground-permission-extension');
    }
}
