<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class UniqueIntegerArrayRule implements Rule
{
    public function passes($attribute, $value)
    {
        if (!is_array($value)) {
            return false;
        }

        $uniqueValues = array_unique(array_map('intval', $value));

        return count($uniqueValues) === count($value) && $this->validateIntegerValues($uniqueValues);
    }

    public function message()
    {
        return 'The :attribute array must contain unique integer values.';
    }

    private function validateIntegerValues($values)
    {
        foreach ($values as $value) {
            if (!is_int($value)) {
                return false;
            }
        }

        return true;
    }
}
