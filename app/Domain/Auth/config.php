<?php
use Laravel\Socialite\Two\FacebookProvider;
use Laravel\Socialite\Two\GoogleProvider;

return [
    /**
     |
     |  Configurar parametros para autenticação do usuario.
     |
     */
    'credentials' => [
        //
        // Campos referente à usuario
        //
        'username' => [
            'email',
            'data->username'
        ],

        //
        // Campo referente à senha
        //
        'password' => null,

        //
        // Tentativas de login
        //
        'taps' => 5
    ],
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
