<?php

return [
    'cols' => [
        [
            'value' => '{name}',
            'label' => 'Name'
        ],
        [
            'value' => '{email}',
            'label' => 'E-Mail'
        ],
    ],
    'recordActions' => [],
    'globalActions' => ['fj-user-delete-all'],
    'sortBy' => [
        'id.desc' => 'New -> Old',
        'id.asc' => 'Old -> New'
    ],
    'sortByDefault' => 'id.desc',
    'filter' => [
        'Role' => [
            'admin' => 'Admin',
            'user' => 'User'
        ]
    ]
];
