<?php

namespace App\Fjord\Extensions;

use AwStudio\Fjord\Fjord\Application\Application;

class PermissionExtension
{
    /**
     * Define the packages and routes that should be extended
     *
     * @var array
     */
    const FOR = [
        'aw-studio/fjord-permissions' => 'permissions',
    ];

    /**
     * Extend the fjord application.
     *
     * @param AwStudio\Fjord\Fjord\Application\Application $app
     */
    public function extend(Application $app)
    {
        $app->prop('buttons', 'playground-permission-extension');
    }
}
