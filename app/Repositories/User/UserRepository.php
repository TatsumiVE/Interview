<?php

namespace App\Repositories\User;

use App\Models\User;

class UserRepository implements UserRepoInterface
{
    public function get()
    {
        return User::all();
    }
<<<<<<< HEAD
    public function show($id){
       return User::where('id',$id)->first();
=======

    public function show($id)
    {
        return User::where('id', $id)->first();
>>>>>>> a915a070eed09a0d11c86916ab3cabe3e3044066
    }
}
