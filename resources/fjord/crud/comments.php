<?php

use App\Http\Controllers\Fjord\Crud\CommentController;

return [
    'controller' => CommentController::class,
    'index' => [
        'preview' => [
            [
                'value' => '{body}',
                'label' => 'Text'
            ],
        ],
        'search' => ['body'],
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
        'load' => [
            // 'employees' => App\Models\Employee::class
        ]
    ],
    'names' => [
        'singular' => ucfirst(__f('models.comment')),
        'plural' => ucfirst(__f('models.comments')),
    ],
    'form_fields' => [
        [
            [
                'id' => 'commentable',
                'type' => 'morphTo',
                'models' => [\App\Models\Employee::class, \App\Models\Department::class],
                'preview' => [
                    \App\Models\Employee::class => [
                        [
                            'key' => '{first_name}',
                            'label' => 'Text'
                        ]
                    ],
                    \App\Models\Department::class => [
                        [
                            'key' => '{name}',
                            'label' => 'Text'
                        ]
                    ],
                ],
                'title' => 'Comment morphTo',
                'hint' => 'Select Staff',
                'width' => 12,
            ],
        ],
    ]
];
