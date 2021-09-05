<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Security
    |--------------------------------------------------------------------------
    |
    | Contient la liste des clefs d'API (.env) accordées à chaque utilisateurs.
    | Si il existe une protection par Gravitee APIM, les clefs API devrait
    | être les mêmes que celles fournis par Gravitee APIM.
    |
    */

    'apikeys' => [

        'Sylvain' => env('SYLVAIN_API_KEY'),
        'Zelty' => env('ZELTY_API_KEY'),
        'DemoApp' => env('APP_API_KEY'),

    ]
];
