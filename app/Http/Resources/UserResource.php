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
            'name'=>$this->name,
            'email'=>$this->email,
            'is_active'=>$this->is_active,
            'role'=>$role->pluck('name'),
            'password'=>$this->password,
            'token'=>$this->token,
        ];

    }
}
