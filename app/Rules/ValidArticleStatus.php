<?php
namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\ArticleStatus;

class ValidArticleStatus implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return !empty(ArticleStatus::find($value));
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'This :attribute not exists';
    }
}
