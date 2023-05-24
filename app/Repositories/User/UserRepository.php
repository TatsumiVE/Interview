<?php

namespace App\Repositories\User;

use App\Models\User;

class UserRepository implements UserRepoInterface
{
    public function get()
    {
        return User::with('interviewer')->get();
    }


    public function show($id)
    {
        return User::with('interviewer')->where('id', $id)->first();

    }
}
