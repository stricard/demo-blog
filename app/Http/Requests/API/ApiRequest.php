<?php
namespace App\Http\Requests\API;

use App\Exceptions\Problems\RequestValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

/**
 * APIRequest Base
 * Class ApiRequest
 * @package App\Http\Requests
 */
abstract class ApiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

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
