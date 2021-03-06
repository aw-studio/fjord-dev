<?php

//use \App\Models\Article;
use \App\Http\Controllers\Fjord\Crud\ArticleController;

/**
 * Crud config for articles.
 */
return [
    'controller' => ArticleController::class,
    //'preview_route' => [Article::class, 'getRoute'],
    'index' => [
        'preview' => [
            [
                'value' => '{title}',
                'label' => 'Title'
            ],
            [
                'value' => '{text}',
                'label' => 'Text'
            ]
        ],
        'search' => ['title', 'text'],
        'sort_by' => [
            'id.desc' => 'New -> Old',
            'id.asc' => 'Old -> New',
        ],
        'sort_by_default' => 'id.desc',
        // 'per_page' => 20,
        // 'filter' => [
        //     'GroupName' => [
        //         'scopeName' => 'Description',
        //     ],
        // ],
        //
        // Models that should be eager-loaded
        // 'load' => [
        //     'user' => App\Models\User::class
        // ]
    ],
    // 'names' => [
    //     'singular' => 'Singular',
    //     'plural' => 'Plural'
    // ],
    'form_fields' => [
        // [
        //     [
        //         'type' => 'input',
        //         'id' => 'title',
        //         'max' => 60,
        //         'title' => 'Title',
        //         'placeholder' => 'Title',
        //         'hint' => 'The title needs to be filled',
        //         'width' => 8
        //     ]
        // ]
        [
            [
                'id' => 'title',
                'type' => 'input',
                'title' => 'Headline',
                'placeholder' => 'Headline',
                'hint' => 'The Headline needs to be filled',
                'width' => 6,
            ],
            [
                'id' => 'text',
                'type' => 'wysiwyg',
                'title' => 'Text',
                'hint' => 'Text',
                'width' => 6,
            ],
        ]
    ]
];
