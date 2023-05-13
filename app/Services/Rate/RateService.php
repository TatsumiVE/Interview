<?php

namespace App\Services\Rate;

use App\Models\Rate;
use Exception;

class RateService implements RateServiceInterface
{
    public function store($data){

        return Rate::create($data);

    }

    public function update($data,$id){
        $result = Rate::where('id',$id)->first();
        return $result->update($data);
    }

}
