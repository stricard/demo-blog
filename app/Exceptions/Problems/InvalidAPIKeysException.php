<?php

namespace App\Exceptions\Problems;

class InvalidAPIKeysException extends APIProblemException
{

    /**
     * InvalidAPIKeysException constructor.
     * @param string|null $invalidApiKey
     *
     */
    public function __construct(?string $invalidApiKey)
    {
        parent::__construct();

        $invalidApiKey ??= '(null)';

        $this->setDetail('Server cannot perform response because `' . $invalidApiKey . '` is an invalid API Key.');
    }


}
