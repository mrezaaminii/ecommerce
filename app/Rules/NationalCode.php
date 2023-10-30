<?php

namespace App\Rules;

use App\Helpers\helper;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class NationalCode implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail):void
    {
        if(!helper::validateNationalCode($value)){
            $fail(":attribute معتبر نمیباشد");
        };
    }
}
