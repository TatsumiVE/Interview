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
                'candidate_id'=>$this->candidate_id,
                'interviewer_id'=>$this->interviewer_id,
                'remark_id' => $this->remark->id,
                'interview_stage_id' => $this->remark->interview_stage_id,
                'comment' => $this->remark->comment,
                'grade' => $this->remark->grade,
                'interview_assign_id' => $this->remark->interview_assign_id,


        ];
    }
}
