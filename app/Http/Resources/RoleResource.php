<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Spatie\Permission\Models\Permission;

class RoleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {        
        // $permissions = Permission::whereIn('id', $this->permissions->pluck('id'))->get();
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'guard_name'=>$this->guard_name,
            // 'permission_name' => $permissions->pluck('name'),
        ];
    }
}
