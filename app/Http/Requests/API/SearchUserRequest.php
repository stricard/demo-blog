<?php

namespace App\Http\Requests\API;

class SearchUserRequest extends ApiRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'page' => ['sometimes', 'required', 'integer'],
            'size' => ['sometimes', 'required', 'integer'],

            'name' => ['sometimes', 'required', 'string', 'max:64'],
            'email' => ['sometimes', 'required', 'email:rfc']
        ];
    }
}
