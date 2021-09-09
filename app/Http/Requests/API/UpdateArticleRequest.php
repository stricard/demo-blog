<?php

namespace App\Http\Requests\API;

use App\Rules\ValidArticleStatus;

class UpdateArticleRequest extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['sometimes', 'required', 'string', 'max:64'],
            'contents' => ['sometimes', 'required', 'string'],
            'status_id' => ['sometimes', 'required', 'integer', new ValidArticleStatus],
            'publication_date' => ['sometimes', 'required', 'date']
        ];
    }
}
