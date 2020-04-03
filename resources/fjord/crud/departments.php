<?php

return [
    'preview_route' => function ($department) {
        return route('departments.show', $department->id);
    },
    'index' => [
        'preview' => [
            [
                'key' => '{name}',
                'label' => 'Department Name'
            ],
            [
                'key' => '{employees_count}',
                'label' => 'Employees'
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
        'load' => [
            // 'employees' => App\Models\Employee::class
        ]
    ],
    'names' => [
        'singular' => ucfirst(__f('models.department')),
        'plural' => ucfirst(__f('models.departments')),
    ],
    'form_fields' => [
        [
            [
                'type' => 'input',
                'id' => 'name',
                'max' => 60,
                'title' => 'Name',
                'placeholder' => 'Department Name',
                'hint' => 'The department\'s name needs to be filled',
                'width' => 8
            ]
        ],
        [
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
            [
                'id' => 'employees',
                'type' => 'hasMany',
                'model' => \App\Models\Employee::class,
                'foreign_key' => 'department_id',
                'preview' => [
                    [
                        'key' => '{fullName}',
                        'label' => 'Name'
                    ],
                ],
                'title' => 'Staff',
                'hint' => 'Select Staff',
                'width' => 12,
            ],
        ],

    ]
];
