<?php

namespace App\Repositories\User;

use App\Models\User;

class UserRepository implements UserRepoInterface
{
    public function get()
    {
        $user = User::with('interviewer')->orderBy('id')->get();
        return $user;
    }


    public function show($id)
    {
        return User::with('interviewer')->where('id', $id)->first();
    }
}
