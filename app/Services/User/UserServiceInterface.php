<?php

namespace App\Services\User;

interface UserServiceInterface{
    public function store($request);
    public function update($request,$id);

    public function destroy($id);
}