<?php

return [

    'base_path' => 'app/Domain',

    'register' => [
        'auth' => 'App\Domain\Auth',
    ],

    'struct' => [
        'entities' => 'Entities',
        'repositories' => 'Repositories',
        'migrations' => 'Migrations',
        'http' => 'Http',
        'controllers' => 'Http/Controllers',
        'routes' => 'Http/Routes',
    ],

    'routes' => [
        'api' => 'api.php',
        'web' => 'web.php',
    ],
];
