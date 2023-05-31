<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CandidateDetailResource extends JsonResource
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
            'rate_id' => new RateResource($this->whenLoaded('rates')),
            // 'candidate_id' => new CandidateResource($this->whenLoaded('candidate')),
            'interviewer_id' => new InterviewerResource($this->whenLoaded('interviewer')),
            'topic_id' => new TopicResource($this->whenLoaded('topics')),
            'interview_stage_id' => new InterviewStageResource($this->whenLoaded('interviewStage')),
        ];
    }
}
