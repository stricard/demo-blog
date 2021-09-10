<?php

namespace App\Http\Requests\API;

use App\Rules\UserExists;
use App\Rules\ValidArticleStatus;

class StoreArticleRequest extends ApiRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'string', 'max:64'],
            'contents' => ['required', 'string'],
            'user_id' => ['required', 'integer', new UserExists],
            'status_id' => ['required', 'integer', new ValidArticleStatus],
            'publication_date' => ['sometimes', 'required', 'date']
        ];
    }
}
