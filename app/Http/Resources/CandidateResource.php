<?php

namespace App\Http\Resources;

use App\Http\Resources\AgencyResource;
use App\Http\Resources\PositionResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CandidateResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'gender' => $this->gender,
            'phone_number' => $this->phone_number,
            'residentail_address' => $this->residentail_address,
            'date_of_birth' => $this->date_of_birth,
            'cv_path' => $this->cv_path,
            'experience' => $this->experience,
            'willingness_to_travel' => $this->willingness_to_travel,
            'expected_salary' => $this->expected_salary,
            'last_salary' => $this->last_salary,
            'earliest_starting_date' => $this->earliest_starting_date,
            'positions_id' => new PositionResource($this->whenLoaded('position')),
            'agencies_id' => new AgencyResource($this->whenLoaded('agency')),
            'languages' => $this->specificLanguage->pluck('devlanguage.name'),
            'status' => $this->status



        ];
    }
}
