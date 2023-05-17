<?php

namespace App\Repositories\User;

use App\Models\User;

class UserRepository implements UserRepoInterface
{
    public function get()
    {
        return User::all();
    }
    public function show($id){
       return User::where('id',$id)->first();
    }
}
