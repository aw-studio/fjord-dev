<?php

use Fjord\Fjord\Models\FjordUser;
use Fjord\Support\Facades\Package;
use App\Http\Controllers\Fjord\Form\Page\HomeController;

/**
 * Config for Page Home.
 */
return [
    'controller' => HomeController::class,
    'form_fields' => [
        [
            [
                'translatable' => true,
                'id' => 'h1',
                'type' => 'input',
                'title' => 'Headline',
                'placeholder' => 'Headline',
                'hint' => 'The Headline needs to be filled',
                'width' => 6,
            ],

            [
                'id' => 'select',
                'type' => 'select',
                'options' => ['a' => 'A', 'b' => 'B'],
                'title' => 'Select',
                'placeholder' => 'Select',
                //'hint' => 'The Headline needs to be filled',
                'width' => 6,
            ],
            [
                'id' => 'icon',
                'type' => 'icon',
                'icons' => Package::get('aw-studio/fjord')->config('icons.fontawesome'),
                'title' => 'Icon',
                'hint' => 'Select an icon.',
                'width' => 2,
            ],
            [
                'id' => 'code',
                'type' => 'code',
                'title' => 'code',
                'placeholder' => 'code',
                'language' => 'text/javascript',
                'hint' => 'code',
                'width' => 10,
            ],
            [
                'id' => 'range',
                'type' => 'range',
                'title' => 'Range',
                'hint' => 'Range',
                'min' => 1,
                'max' => 6,
                'width' => 6,
            ],
            [
                'id' => 'dt',
                'type' => 'dt',
                'title' => 'DateTime',
                'hint' => 'DateTime',
                'width' => 6,
            ],
            [
                'id' => 'text',
                'type' => 'textarea',
                'title' => 'Text',
                'hint' => 'Text',
                'width' => 6,
            ],
            [
                'id' => 'wysiwyg',
                'type' => 'wysiwyg',
                'title' => 'wysiwyg',
                'hint' => 'Text',
                'width' => 6,
                'authorize' => function (FjordUser $user) {
                    //return $user->can('update pages');
                    return true;
                }
            ],

        ],

        [
            'translatable' => true,
            'type' => 'image',
            'id' => 'image',
            'title' => 'Image',
            'hint' => 'A colorful image',
            'width' => 12,
            'maxFiles' => 1,
        ],
        /*
        [
            'translatable' => false,
            'id' => 'h1',
            'type' => 'input',
            'title' => 'Headline',
            'placeholder' => 'Headline',
            'hint' => 'The Headline needs to be filled',
            'width' => 12
        ],
        [
            'translatable' => false,
            'id' => 'h2',
            'type' => 'input',
            'title' => 'Headline',
            'placeholder' => 'Headline',
            'hint' => 'The Headline needs to be filled',
            'width' => 12
        ],
        [
            'id' => 'executives',
            'type' => 'relation',
            'model' => \App\Models\Employee::class,
            'edit' => 'employees',
            'many' => true,
            'preview' => [
                [
                    'type' => 'image',
                    'key' => 'image.conversion_urls.sm'
                ],
                '{fullName}',
            ],
            'title' => 'Executives',
            'hint' => 'Choose the company\'s executives.',
            'width' => 12,
            'button' => 'Add Executive'
        ],
        */
        [
            'id' => 'content_block',
            'type' => 'block',
            'title' => 'Content',
            'hint' => 'The Headline needs to be filled',
            'width' => 12,
            'repeatables' => [
                'text', 'image'
            ]
        ],
    ]
];
