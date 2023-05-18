<?php

namespace App\Http\Resources;

use App\Http\Resources\LanguageResource;
use App\Http\Resources\CandidateResource;
use Illuminate\Http\Resources\Json\JsonResource;

class SpecificLanguageResource extends JsonResource
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
            'language_id' => new DevLanguageResource($this->whenLoaded('language')),
            'candidate_id' => new CandidateResource($this->whenLoaded('candidate')),
        ];
    }
}
