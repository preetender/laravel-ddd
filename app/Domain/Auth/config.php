<?php
use Laravel\Socialite\Two\FacebookProvider;
use Laravel\Socialite\Two\GoogleProvider;

return [
    /**
     |
     | Lista de provedores configurados em config/services.php
     |
     */
    'providers' => [
        'facebook' => [
            'instance' => FacebookProvider::class,
            'fields' => [
                'id' => null,
                'name' => null,
                'email' => null,
                'avatar' => 'avatar_original'
            ]
        ],
        'google' => [
            'instance' => GoogleProvider::class,
            'fields' => [
                'id' => null,
                'name' => null,
                'email' => null,
                'avatar' => null
            ]
        ]
    ]
];
