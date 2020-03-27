<?php

namespace App\Fjord;

class Kernel
{
    /**
     * The Fjord extension provided by your application.
     *
     * @var array
     */
    public $extensions = [
        \App\Fjord\Extensions\PermissionExtension::class
    ];
}
