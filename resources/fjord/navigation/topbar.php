<?php

return [
    [
        __f('fj.user_administration'),
        fjord()->navEntry('users'),
        fjord()->navEntry('permissions'),
    ],
    [
        fjord()->navEntry('collections.settings', [
            'title' => __f('fj.settings')
        ])
    ]
];
