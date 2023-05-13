<?php

namespace App\Repositories\User;
use App\Models\User;

class UserRepository implements UserRepoInterface{
    public function get(){
        $user=User::all();
        return $user;        
    }
}