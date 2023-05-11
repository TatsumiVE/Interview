<?php 

namespace App\Services\User;

use App\Models\User;
use App\Traits\ApiResponser;

class UserService implements UserServiceInterface{
    use ApiResponser;
    public function store($request){
        $user = User::create($request);
        $success['token'] =  $user->createToken('App')->plainTextToken;
        $success['name'] =  $user->name;
        return $success;

    }
}