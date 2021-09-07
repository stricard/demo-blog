<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class UpdateArticleRequest extends ApiRequest
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
            'title' => ['sometimes', 'required', 'string', 'max:64'],
            'contents' => ['sometimes', 'required', 'string'],
            'status_id' => ['sometimes', 'required', 'integer'],
            'publication_date' => ['sometimes', 'required', 'date']
        ];
    }
}
