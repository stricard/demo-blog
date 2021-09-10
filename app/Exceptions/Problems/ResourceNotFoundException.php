<?php

namespace App\Exceptions\Problems;

class ResourceNotFoundException extends APIProblemException
{

    /**
     * ResourceNotFoundException constructor.
     * @param string|null $resource
     *
     */
    public function __construct(?string $resource)
    {
        parent::__construct();

        $resource ??= '(null)';

        $this->setDetail('The Resource `' . $resource . '` not found.');
    }


}
