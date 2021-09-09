<?php

namespace App\Http\Requests\API;

use App\Rules\ValidArticleStatus;

class SearchArticleRequest extends ApiRequest
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

            'title' => ['sometimes', 'required', 'string', 'max:128'],
            'autor' => ['sometimes', 'required', 'string', 'max:64'],
            'status_id' => ['sometimes', 'required', 'integer', new ValidArticleStatus]
        ];
    }
}
