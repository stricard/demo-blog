<?php

use App\Exceptions\Problems\InvalidAPIKeysException;
use App\Definitions\HttpStatusCode;
use App\Exceptions\Problems\RequestValidationException;
use App\Exceptions\Problems\ArticleAlreadyExists;
use App\Exceptions\Problems\ResourceNotFoundException;

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

    RequestValidationException::class => [
        "type" => "validation-error",
        "title" => "Your request parameters didn't validate.",
        "status" => HttpStatusCode::HTTP_BAD_REQUEST,
    ],

    ArticleAlreadyExists::class => [
        "type" => "article-already-exists",
        "title" => "Already existing article.",
        "status" => HttpStatusCode::HTTP_UNPROCESSABLE_ENTITY,
    ],

    ResourceNotFoundException::class => [
        "type" => "resource-not-found",
        "title" => "This Resource is not found.",
        "status" => HttpStatusCode::HTTP_NOT_FOUND,
    ],

    'default' => [
        'type' => 'generic-error',
        'title' => 'A error occured',
        'status' => 400,
    ]
];
