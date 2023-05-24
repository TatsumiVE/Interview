<?php

namespace App\Http\Resources;

use App\Services\User\UserService;
use Illuminate\Http\Resources\Json\JsonResource;
use Spatie\Permission\Models\Role;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $role = Role::whereIn('id', $this->roles->pluck('id'))->get();
        return [
            'id'=>$this->id,
            'interviewer_id'=>new InterviewerResource($this->whenLoaded('interviewer')),
            'password'=>$this->password,
            'role'=>$role->pluck('name'),           
            'token'=>$this->token,
        ];

    }
}
