<?php

use App\Http\Controllers\Fjord\Crud\TagController;

return [
    'controller' => TagController::class,
    'index' => [
        'preview' => [
            [
                'value' => '{name}',
                'label' => 'Tag'
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
        'singular' => ucfirst(__f('models.tag')),
        'plural' => ucfirst(__f('models.tags')),
    ],
    'form_fields' => [
        [
            [
                'id' => 'departments_morphed_by_many',
                'type' => 'morphedByMany',
                'model' => \App\Models\Department::class,
                'preview' => [
                    [
                        'value' => '{name}',
                        'label' => 'Name'
                    ],
                ],
                'title' => 'departments morphToMany',
                'hint' => 'Select Staff',
                'width' => 12,
            ],
        ],
    ]
];
