<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InterviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'interview_summarize' => $this->interview_summarize,
            'interview_result_date' => $this->interview_result_date,
            'interview_result' => $this->interview_result,
            'candidate_id' => new CandidateResource($this->whenLoaded('candidate')),
            'interview_stages_id' => new InterviewStageResource($this->whenLoaded('intervieStages')),


        ];
    }
}
