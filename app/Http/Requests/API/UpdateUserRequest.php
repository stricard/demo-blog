<?php

namespace App\Http\Requests\API;

class UpdateUserRequest extends ApiRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['sometimes', 'required', 'string', 'max:64'],
            'email' => ['sometimes', 'required', 'email:rfc']
        ];
    }
}
