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

            'candidate_id' => $this->candidate_id,
            'interviewer_id' => $this->interviewer_id,
            'remark_id' => $this->remark->id,
            'interview_stage_id' => $this->remark->interview_stage_id,
            'comment' => $this->remark->comment,
            'grade' => $this->remark->grade,
            'interview_assign_id' => $this->remark->interview_assign_id,
            'id' => $this->id,
            'interview_summarize' => $this->interview_summarize,
            'interview_result_date' => $this->interview_result_date,
            'interview_result' => $this->interview_result,
            'candidate_id' => new CandidateResource($this->whenLoaded('candidate')),
            'interview_stage_id' => new InterviewStageResource($this->whenLoaded('interviewStage')),



        ];
    }
}
