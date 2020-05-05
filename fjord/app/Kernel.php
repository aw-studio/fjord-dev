<?php

namespace FjordApp;

use Fjord\Application\Kernel as FjordKernel;

class Kernel extends FjordKernel
{
    /**
     * The Fjord extension provided by your application.
     *
     * @var array
     */
    public $extensions = [
        'fj-users' => \FjordApp\Extensions\UserExtension::class,
    ];
}
