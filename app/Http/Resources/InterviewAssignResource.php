<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InterviewAssignResource extends JsonResource
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
            'interview_id' => new InterviewResource($this->whenLoaded('interviewassign')),
            'interviewer_id' => new InterviewerResource($this->whenLoaded('interviewassign')),


        ];
    }
}
