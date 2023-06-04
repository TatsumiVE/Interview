<?php

namespace App\Services\User;

use App\Models\User;
use App\Traits\ApiResponser;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserService implements UserServiceInterface
{
    use ApiResponser;
    public function store($request)
    {
        return DB::transaction(function () use ($request) {
            $request['password'] = Hash::make($request['password']);
            $user = User::create($request);
            if (isset($request['role'])) {
                $user->assignRole($request['role']);
            }
            return $user;
        });
    }

    public function update($request, $id)
    {
        return DB::transaction(function () use ($request, $id) {
            $user = User::where('id', $id)->first();
            if (isset($request['role'])) {
                $user->syncRoles($request['role']);
            }
            return $user;
        });
    }
}
