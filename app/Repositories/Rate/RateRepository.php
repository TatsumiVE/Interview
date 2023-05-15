<?php

namespace App\Repositories\Rate;

use Exception;
use App\Models\Rate;


class RateRepository implements RateRepoInterface{
    public function get(){
        return Rate::with('assessment')->get();

    }

    public function show($id){
        return $data = Rate::where('id',$id)->first();
    }

}
