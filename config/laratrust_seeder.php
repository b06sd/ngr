<?php

return [
    'role_structure' => [
        'superadministrator' => [
            'users' => 'c,r,u,d',
            'acl' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'administrator' => [
            'physicalplanning' => 'c,r,u,d',
            'horc' => 'c,r,u,d',
            'livesearch' => 'r',
            'lands' => 'c,r,u,d',
            'users' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'physicalplanning' => [
            'physicalplanning' => 'c,r,u',
            'profile' => 'r,u',
            'filing' => 'c,r,u'
        ],
        'horc' => [
            'horc' => 'c,r,u',
            'profile' => 'r,u',
            'filing' => 'c,r,u'
        ], 
        'newgrowth' => [
            'livesearch' => 'r',
            'profile' => 'r,u',
            'filing' => 'c,r,u'
        ], 
        'lands' => [
            'lands' => 'c,r,u',
            'profile' => 'r,u',
            'filing' => 'c,r,u'
        ],                       
    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
