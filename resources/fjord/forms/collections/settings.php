<?php

use App\Http\Controllers\Fjord\Form\Collection\SettingsController;

/**
 * Config for Collection Settings.
 */
return [
    'controller' => SettingsController::class,
    'title' => __f('fj.settings'),
    'form_fields' => [
        [
            'translatable' => false,
            'id' => 'title',
            'type' => 'input',
            'title' => 'Title',
            'placeholder' => config('app.name'),
            'hint' => 'The Title of this Website.',
            'width' => 12
        ],
    ]
];
