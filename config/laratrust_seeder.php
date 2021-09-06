<?php

return [
    'role_structure' => [
        'administrator' => [
            'users' => 'c,r,u,d',
            'acl' => 'c,r,u,d',
            'profile' => 'r,u',
            'content' => 'c,r,u,d'
        ],
        'visitor' => [
            'profile' => 'r,u'
        ],
        'manager' => [
            'profile' => 'r,u'
        ],
        'editor' => [
            'profile' => 'r,u',
        ],
    ],
    'permission_structure' => [
        'cru_user' => [
            'profile' => 'c,r,u'
        ],
        'cru_content' => [
            'content' => 'c,r,u'
        ],
    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];