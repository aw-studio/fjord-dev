<?php

use App\Http\Controllers\Fjord\Crud\ProjectController;

return [
    'controller' => ProjectController::class,
    'index' => [
        'preview' => [
            [
                'value' => '{title}',
                'label' => 'Title'
            ],
            [
                'value' => '{manager.last_name}',
                'label' => 'Projectmanager'
            ],
            [
                'sort_by' => 'project_status_id',
                'component' => 'project-status',
                'label' => 'Status'
            ],
            [
                'value' => '{completion_date}',
                'component' => 'project-completion',
                'label' => 'Days left'
            ],
            [
                'value' => '{staff}',
                'component' => 'project-team',
                'label' => 'Staff'
            ],
        ],
        'search' => ['title', 'manager.last_name'],
        'sort_by' => [
            'id.desc' => 'New -> Old',
            'id.asc' => 'Old -> New',
        ],
        'sort_by_default' => 'id.desc',
        // 'per_page' => 20,
        'filter' => [
            'Status' => [
                "onTrack" => "on track",
                "offTrack" => "off track",
                "onHold" => "on hold",
                "ready" => "ready",
                "blocked" => "blocked",
                "finished" => "finished"
            ],
        ],
        //
        // Models that should be eager-loaded
        'load' => [
            'manager' => App\Models\Employee::class,
            'status' => App\Models\ProjectStatus::class,
            'staff.department' => App\Models\Employee::class,
        ]
    ],
    'names' => [
        'singular' => ucfirst(__f('models.project')),
        'plural' => ucfirst(__f('models.projects')),
    ],
    'form_fields' => [
        [
            [
                'type' => 'input',
                'id' => 'title',
                'max' => 60,
                'title' => 'Title',
                'placeholder' => 'Title',
                'hint' => 'The project\'s title',
                'width' => 8
            ],
            [
                'id' => 'employee_id',
                'type' => 'select',
                'title' => 'Projectmanager',
                'options' => App\Models\Employee::projectManagement()->get()->mapWithKeys(function ($item, $key) {
                    return [$item->id => $item->fullName];
                })->toArray(),
                'hint' => 'Select a Projectmanager',
                'width' => 4
            ],
            [
                'id' => 'completion_date',
                'type' => 'dt',
                'formatted' => 'l',
                'title' => 'Completion-Date',
                'placeholder' => 'Completion-Date',
                'hint' => 'The project\'s Completion-Date',
                'width' => 4
            ],
            [
                'type' => 'input',
                'input_type' => 'number',
                'id' => 'budget',
                'title' => 'Budget',
                'placeholder' => 'Budget',
                'hint' => 'The project\'s budget',
                'append' => '$',
                'width' => 4
            ],
            [
                'id' => 'project_status_id',
                'type' => 'select',
                'title' => 'Status',
                'options' => App\Models\ProjectStatus::get()->mapWithKeys(function ($item, $key) {
                    return [$item->id => $item->title];
                })->toArray(),
                'hint' => 'Select a Status',
                'width' => 4
            ],
            [
                'type' => 'wysiwyg',
                'id' => 'description',
                'title' => 'Description',
                'placeholder' => 'Description',
                'hint' => 'A short description of the project',
                'width' => 12
            ],
        ],
        [
            [
                'id' => 'staff',
                'model' => App\Models\Employee::class,
                'type' => 'belongsToMany',
                'preview' => [
                    [
                        'value' => '{fullName}',
                        'label' => 'Full Name'
                    ],
                ],
                'title' => 'Select Staff',
                'hint' => 'Select Staff',
                'width' => 12,
            ],
        ]
    ]
];
