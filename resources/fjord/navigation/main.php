<?php

return [
    [
        'Collections',
        [
            'title' => ucfirst(__f('fj.pages')),
            'icon' => '<i class="fas fa-file"></i>',
            'children' => [
                [
                    'title' => 'Home',
                    'link' => 'pages/home',
                    'icon' => '<i class="fas fa-home"></i>'
                ],
            ],
        ],
    ],
    [
        'Crud',
        [
            'title' => ucfirst(__f('models.departments')),
            'link' => 'departments',
            'permission' => 'read departments',
            'icon' => '<i class="fas fa-building"></i>'
        ],
        [
            'title' => ucfirst(__f('models.employees')),
            'link' => 'employees',
            'permission' => 'read employees',
            'icon' => '<i class="fas fa-users"></i>'
        ],
        [
            'title' => ucfirst(__f('models.projects')),
            'link' => 'projects',
            'permission' => 'read projects',
            'icon' => '<i class="fas fa-project-diagram"></i>'
        ],
    ],
    /*
    [
        'component' => 'example'
    ]
    */
];
