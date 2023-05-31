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
        $roles = Role::whereIn('id', $this->roles->pluck('id'))->get();

        $roleData = $roles->map(function ($role) {
            return [
                'id' => $role->id,
                'name' => $role->name,
            ];
        });

        return [
            'id' => $this->id,
            'interviewer_id' => new InterviewerResource($this->whenLoaded('interviewer')),
            'password' => $this->password,
            'status' => $this->status,
            'role' => $roleData,
            'token' => $this->token,
        ];
    }
}
