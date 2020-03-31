<?php

return [
    'cols' => [
        [
            'key' => '{name}',
            'label' => 'Name'
        ],
        [
            'key' => '{email}',
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