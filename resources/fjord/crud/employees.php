<?php

use App\Models\Employee;
use App\Http\Controllers\Fjord\Crud\EmployeeController;

return [
    'controller' => EmployeeController::class,
    //'preview_route' => [Employee::class, 'getRoute'],
    'index' => [
        'query' => Employee::query()->withCount('projects'),
        'preview' => [
            [
                'component' => 'fj-col-image',
                'props' => [
                    'src' => '{image.conversion_urls.sm}',
                ],
                'link' => false,
                'width' => '50px',
                'label' => 'Image',
            ],
            [
                'value' => '{last_name}',
                'sort_by' => 'last_name',
                'link' => 'employees/{id}/edit#email',
                'label' => 'Lastname'
            ],
            [
                'value' => '{first_name}',
                'sort_by' => 'first_name',
                'label' => 'Firstname'
            ],
            [
                'component' => 'fj-col-crud-relation',
                'props' => [
                    'relation' => 'department',
                    'value' => 'name',
                    'link' => 'departments'
                ],
                'link' => false,
                'sort_by' => 'department.name',
                'label' => 'Department'
            ],
            [
                'sort_by' => 'projects_count',
                'component' => 'employee-projects',
                'link' => 'employees/{id}/edit#projects',
                'label' => 'Projects'
            ],
        ],
        'search' => ['last_name', 'first_name'],
        'sort_by' => [
            'id.desc' => __f('fj.sort_new_to_old'),
            'id.asc' => __f('fj.sort_old_to_new'),
        ],
        'sort_by_default' => 'id.desc',
        'per_page' => 20,
        'filter' => [
            'Department' => [
                'development' => 'Development',
                'marketing' => 'Marketing',
                'projectManagement' => 'Project-Management',
                'sales' => 'Sales',
                'humanResources' => 'Human-Resources'
            ],
        ],
        //
        // Models that should be eager-loaded
        'load' => [
            'department' => App\Models\Department::class,
            'projects' => App\Models\Project::class
        ]
    ],
    'names' => [
        'singular' => ucfirst(__f('models.employee')),
        'plural' => ucfirst(__f('models.employees')),
    ],
    'form_fields' => [
        [
            [
                'id' => 'comments_morph_one',
                'type' => 'morphOne',
                'model' => \App\Models\Comment::class,
                'preview' => [

                    [
                        'key' => '{body}',
                        'label' => 'Text'
                    ],
                ],
                'title' => 'Comment morphOne',
                'hint' => 'Select Staff',
                'width' => 12,
            ],
        ],
        [
            [
                'id' => 'department',
                'type' => 'belongsTo',
                'model' => \App\Models\Department::class,
                'preview' => [
                    [
                        'value' => '{name}',
                        'label' => 'Name'
                    ],
                ],
                'title' => 'department belongsTo',
                'hint' => 'Select Staff',
                'width' => 12,
            ],
        ],
        [
            [
                'id' => 'projects',
                'model' => App\Models\Project::active(),
                'type' => 'belongsToMany',
                'preview' => [
                    [
                        'value' => '{title}',
                        'label' => 'Title'
                    ],
                ],
                'title' => 'Works on',
                'hint' => 'Select Projects',
                'width' => 12,
            ],
        ],
        [
            [
                'type' => 'input',
                'id' => 'first_name',
                'title' => 'Firstname',
                'placeholder' => 'Firstname',
                'hint' => 'The firstname needs to be filled',
                'width' => 5
            ],
            [
                'type' => 'input',
                'id' => 'last_name',
                'title' => 'Lastname',
                'placeholder' => 'Lastname',
                'hint' => 'The lastname needs to be filled',
                'width' => 7
            ],
            [
                'type' => 'input',
                'id' => 'email',
                'title' => 'Email',
                'placeholder' => 'Email',
                'hint' => 'The employee\'s email-address',
                'width' => 7,
                'authorize' => function ($user) {
                    return $user->can('update employees');
                }
            ],
            [
                'id' => 'department_id',
                'type' => 'select',
                'title' => 'Department',
                'options' => App\Models\Department::all()->mapWithKeys(function ($item, $key) {
                    return [$item->id => $item->name];
                })->toArray(),
                'hint' => 'Select Department',
                'width' => 7,
                'readonly' => true
            ],
            [
                'id' => 'image',
                'type' => 'image',
                'title' => 'Portrait-Image',
                'hint' => 'Portrait-Image',
                'width' => 7,
                'image_size' => 12,
                'maxFiles' => 1,
                'crop' => true,
                'ratio' => 3 / 4,
                'square' => false
            ],
        ],
    ]
];
