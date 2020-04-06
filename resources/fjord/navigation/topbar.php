<?php

return [
    [
        'Nutzerverwaltung',
        fjord()->navEntry('users'),
        fjord()->navEntry('permissions'),
    ],
    [
        fjord()->navEntry('collections.settings')
    ]
];
