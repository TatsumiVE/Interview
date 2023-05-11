<?php 

namespace App\Repositories\User;
use App\Models\User;

class UserRepository implements UserRepoInterface{
    public function get(){

       $result = User::all();       
       return $result;
    }
}