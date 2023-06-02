<?php

namespace App\Http\Resources;

use App\Http\Resources\PositionResource;
use Illuminate\Http\Resources\Json\JsonResource;

class InterviewerResource extends JsonResource
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
            'email'=>$this->email,
            'department_id' => new DepartmentResource($this->whenLoaded('department')),
            'position_id'=>new PositionResource($this->whenLoaded('position')),
            
        ];

        // return [
        //     'id' => $this->id, // Make sure $this refers to a valid object with the id property
        //     'name' => $this->name,
        //     'email' => $this->email,
        //     'department_id' => $this->whenLoaded('department')
        //         ? new DepartmentResource($this->department)
        //         : null,
        //     'position_id' => $this->whenLoaded('position')
        //         ? new PositionResource($this->position)
        //         : null,
        // ];
    }
}
