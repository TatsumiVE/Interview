<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Carbon\Carbon;

class InterviewResultDateRule implements Rule
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
        $today = Carbon::today();
        $tomorrow = Carbon::tomorrow();
        $selectedDate = Carbon::parse($value);
        return $selectedDate->isSameDay($today) || $selectedDate->isSameDay($tomorrow);
    }



    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The interview result date must be today or a future date.';
    }
}
