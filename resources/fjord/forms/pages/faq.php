<?php

use App\Models\Employee;
use App\Http\Controllers\Fjord\Form\Page\FaqController;

/**
 * Config for Page Faq.
 */
return [
    'controller' => FaqController::class,
    'form_fields' => [

        [
            'id' => 'dt',
            'type' => 'dt',
            'title' => 'DateTime',
            'hint' => 'DateTime',
            'width' => 6,
        ],
        [
            'id' => 'employees',
            'type' => 'relation',
            'model' => Employee::where('first_name', 'LIKE', 'I%'),
            'many' => true,
            'preview' => [
                [
                    'value' => '{first_name}',
                ],
            ],
            'title' => 'Mitarbeiter',
            'width' => 6,
        ],
    ]
];
