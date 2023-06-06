<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class InterviewTimeRule implements Rule
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
        $start = strtotime('9:00 AM');
        $end = strtotime('4:00 PM');
        $selectedTime = strtotime($value);

        return ($selectedTime >= $start && $selectedTime <= $end);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The interview time must be between 9 am and 4 pm.';
    }
}
