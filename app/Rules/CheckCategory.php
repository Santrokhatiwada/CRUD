<?php

namespace App\Rules;
use App\Models\Category;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CheckCategory implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $category=Category::where('id',$value)->exists();
        if(!$category){
            $fail('category doesnot exist');

        }
    }
}
