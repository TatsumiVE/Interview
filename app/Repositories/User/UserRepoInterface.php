<?php

namespace App\Repositories\User;

interface UserRepoInterface{
    public function get();

    public function show($id);
}