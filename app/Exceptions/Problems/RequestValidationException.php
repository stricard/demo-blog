<?php

namespace App\Exceptions\Problems;

use Illuminate\Contracts\Validation\Validator;

class RequestValidationException extends APIProblemException
{

    /**
     * RequestValidationException constructor.
     * @param Validator $validator
     */
    public function __construct(Validator $validator)
    {
        parent::__construct();

        $invalidParams = [];
        foreach ($validator->errors()->messages() as $paramName => $failedReason)
            $invalidParams[]=['name' => $paramName, 'reasons' => $failedReason];

        $this->addCustomAttributes('invalid-params', $invalidParams);
    }

}
