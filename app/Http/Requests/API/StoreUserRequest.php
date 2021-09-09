<?php

namespace App\Http\Requests\API;

class StoreUserRequest extends ApiRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:64'],
            'email' => ['required', 'email:rfc']
        ];
    }
}
