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
        // Convert time to 24-hour format
        $selectedTime = date('H:i', strtotime($value));

        // Define start and end times
        $start = '09:00';
        $end = '16:00';

        // Check if selected time is between start and end times
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
