<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InterviewAssignRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'stage_name' => 'required',
            'interview_date' => 'required',
            'interview_time' => 'required',
            'location' => '',
            'record_path' => '',
            'interview_result' => '',
            'interview_summarize' => '',
            'interview_result_date' => '',
            'candidate_id' => 'required',
            'interview_stages_id' => 'required',
            'name' => 'required',
            'position_id' => 'required',
        ];
    }
}
