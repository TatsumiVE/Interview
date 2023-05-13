<?php

namespace App\Services\Rate;
Interface RateServiceInterface{
    public function store($data);
    public function update($data,$id);
}
