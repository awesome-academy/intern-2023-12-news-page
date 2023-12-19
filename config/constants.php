<?php

    return [
        'roles' => [
            ['name' => 'User', 'slug' => 'user', 'level' => 1],
            ['name' => 'Moderator', 'slug' => 'moderator', 'level' => 2],
            ['name' => 'Admin', 'slug' => 'admin', 'level' => 3],
        ],
        'statuses' => [
            [
                'type' => 'account',
                'slug' => 'normal',
                'name' => 'Active',
                'reason' => 'Account is active',
            ],
            [
                'type' => 'account',
                'slug' => 'ban',
                'name' => 'Banned',
                'reason' => 'Account is banned',
            ],
            [
                'type' => 'post',
                'slug' => 'normal',
                'name' => 'Published',
                'reason' => 'Post is published',
            ],
            [
                'type' => 'review',
                'slug' => 'ban',
                'name' => 'Banned',
                'reason' => 'Review is banned',
            ],
            [
                'type' => 'post',
                'slug' => 'ban',
                'name' => 'Banned',
                'reason' => 'Post is banned',
            ],
            [
                'type' => 'review',
                'slug' => 'normal',
                'name' => 'Published',
                'reason' => 'Review is published',
            ],
        ],
    ];
