<?php

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
    ]
];
