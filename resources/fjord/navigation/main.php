<?php

return [
    [
        'Collections',
        [
            'title' => ucfirst(__f('fj.pages')),
            'icon' => '<i class="fas fa-file"></i>',
            'children' => [
                fjord()->navEntry('pages.home', [
                    'icon' => '<i class="fas fa-home">'
                ]),
                fjord()->navEntry('pages.faq', [
                    'icon' => '<i class="fas fa-home">'
                ]),
            ],
        ],
    ],
    [
        'Crud',
        fjord()->navEntry('crud.departments', [
            'title' => ucfirst(__f("models.departments")),
            'icon' => '<i class="fas fa-building">',
        ]),
        fjord()->navEntry('crud.employees', [
            'title' => ucfirst(__f("models.employees")),
            'icon' => '<i class="fas fa-users">'
        ]),
        fjord()->navEntry('crud.projects', [
            'title' => ucfirst(__f("models.projects")),
            'icon' => '<i class="fas fa-project-diagram">',

        ]),
        fjord()->navEntry('crud.articles', [
            'title' => 'Artikel',
            'icon' => '<i class="fas fa-project-diagram">'
        ]),
    ],
    /*
    [
        'component' => 'example'
    ]
    */
];
