<?php

namespace App\Http\Requests\API;

class SearchArticleRequest extends ApiRequest
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
            'autor' => ['sometimes', 'required', 'string', 'max:64']
        ];
    }
}
