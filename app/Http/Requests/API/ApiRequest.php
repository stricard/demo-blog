<?php
namespace App\Http\Requests\API;

use App\Exceptions\Problems\RequestValidationException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

/**
 * APIRequest Base
 * Class ApiRequest
 * @package App\Http\Requests
 */
abstract class ApiRequest extends FormRequest
{

    /**
     * Comportement en cas d'échec de validation
     * @param Validator $validator
     * @throws RequestValidationException
     */
    protected function failedValidation(Validator $validator): void
    {
        throw new RequestValidationException($validator);
    }
}
