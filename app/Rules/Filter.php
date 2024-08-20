<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Filter implements ValidationRule
{

   protected $forbiddens;
    public function __construct($forbiddens)
    {
        $this->forbiddens = $forbiddens;
    }
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
//        if (strtolower($value) == 'laravel') {
//            $fail('The ' . $attribute . ' value is invalid.');
//        }

//        if (in_array(strtolower($value), $this->forbiddens)) {
//            $fail('The ' . $attribute . ' value is invalid.');
//        }

            if (in_array(strtolower($value), $this->forbiddens)) {
                $fail('The ' . $attribute . ' value is invalid.');
            }


    }
}
