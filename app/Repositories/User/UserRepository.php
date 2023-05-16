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

    public function show($id)
    {
        return User::where('id', $id)->first();
=======
    public function show($id){
       return User::where('id',$id)->first();
>>>>>>> 4a4a9180186570197023fdb91f76aefda92e58df
    }
}
