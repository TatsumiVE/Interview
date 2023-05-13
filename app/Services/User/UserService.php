<?php

namespace App\Services\User;
use App\Models\User;
use App\Traits\ApiResponser;
use Illuminate\Support\Facades\Hash;

class UserService implements UserServiceInterface{
    use ApiResponser;
    public function store($request){
       
       
        $request['password'] = Hash::make($request['password']);

        $user = User::create($request);  
        
       
        
        return $user;
    }

    public function update($request,$id){
        $user=User::where('id',$id)->first();

        return $user->update($request);

    }
}