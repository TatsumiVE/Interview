<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InterviewStageResource extends JsonResource
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
            'stage_name' => $this->stage_name,
            'interview_date' => $this->id,
            'interview_time' => $this->interview_time,
            'location' => $this->location,
            'record_path' => $this->record_path
        ];
    }
}
