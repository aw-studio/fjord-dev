<?php

use Fjord\Fjord\Models\FjordUser;
use App\Http\Controllers\Fjord\Crud\DepartmentController;

return [
    'controller' => DepartmentController::class,
    'preview_route' => function ($department) {
        return route('departments.show', $department->id);
    },
    'index' => [
        'preview' => [
            [
                'value' => '<b>{name}</b>',
                'sort_by' => 'name',
                'label' => 'Department Name',
            ],
            [
                'value' => '{employees_count}',
                'label' => 'Employees',
            ],

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
            'id' => 'content',
            'type' => 'block',
            'title' => 'Content',
            'hint' => 'The Headline needs to be filled',
            'width' => 12,
            'repeatables' => [
                'text', 'image'
            ]
        ],
        /*[
            
            [
                'type' => 'input',
                'id' => 'name',
                'max' => 60,
                'title' => 'Name',
                'placeholder' => 'Department Name',
                'hint' => 'The department\'s name needs to be filled',
                'width' => 8
            ]
            ],*/
        [
            [
                'id' => 'tags_morph_to_many',
                'confirm_unlink' => false,
                'type' => 'morphToMany',
                'model' => \App\Models\Tag::class,
                'preview' => [
                    [
                        'value' => '{name}',
                        'label' => 'Tag'
                    ],
                ],
                'title' => 'tags morphToMany',
                'hint' => 'Select Staff',
                'width' => 12,
            ],
        ],
        [
            [
                'id' => 'comments_morph_many',
                'type' => 'morphMany',
                'readonly' => function (FjordUser $user) {
                    return true;
                },
                'model' => \App\Models\Comment::class,
                'preview' => [
                    [
                        'value' => '{body}',
                        'label' => 'Text'
                    ],
                ],
                'title' => 'comments_morph_many',
                'hint' => 'Select Staff',
                'width' => 12,
            ],
        ],
        [
            [
                'id' => 'employees_belongs_to_many',
                'type' => 'belongsToMany',
                'sortable' => true,
                'model' => \App\Models\Employee::class,
                'preview' => [
                    [
                        'value' => '{fullName}',
                        'label' => 'Name'
                    ],
                ],
                'title' => 'employees belongsToMany',
                'hint' => 'Select Staff',
                'width' => 12,
            ],
        ],
        [
            [
                'id' => 'employees_relation',
                'type' => 'relation',
                'many' => 'true',
                'model' => \App\Models\Employee::class,
                'preview' => [
                    [
                        'value' => '{fullName}',
                        'label' => 'Name'
                    ],
                ],
                'title' => 'employees relation',
                'hint' => 'Select Staff',
                'width' => 12,
            ],
        ],
        [
            /*
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
                'id' => 'employees_has_many',
                'type' => 'hasMany',
                'model' => \App\Models\Employee::class,
                'preview' => [
                    [
                        'value' => '{fullName}',
                        'label' => 'Name'
                    ],
                ],
                'title' => 'employees hasMany',
                'hint' => 'Select Staff',
                'width' => 12,
            ],
        ],

    ]
];
