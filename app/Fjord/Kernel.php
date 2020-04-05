<?php

namespace App\Fjord;

use Fjord\Application\Kernel as FjordKernel;

class Kernel extends FjordKernel
{
    /**
     * The Fjord extension provided by your application.
     *
     * @var array
     */
    public $extensions = [
        'fj-crud-index::employees' => \App\Fjord\Extensions\EmployeeCrudExtension::class
    ];
}
