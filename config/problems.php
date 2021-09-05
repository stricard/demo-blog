<?php

use App\Exceptions\Problems\InvalidAPIKeysException;
use App\Definitions\HttpStatusCode;

return [

    /*
    |--------------------------------------------------------------------------
    | Problems
    |--------------------------------------------------------------------------
    |
    | Défini les propriétés génériques de "ApiProblem" lié à chaque ApiProblemException.
    | Les exceptions non décrites seront chargées à partir de la config "default", pouvant être modifée la volée.
    |
    | /!\ L'attribut défaut ne devrait jamais être utilisé.
    |
    | https://tools.ietf.org/html/rfc7807
    */

    InvalidAPIKeysException::class => [
        'type' => 'invalid-api-key',
        'title' => 'Unauthorized access',
        'status' => HttpStatusCode::HTTP_UNAUTHORIZED,
    ],

    'default' => [
        'type' => 'generic-error',
        'title' => 'A error occured',
        'status' => 400,
    ]
];
