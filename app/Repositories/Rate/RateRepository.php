<?php

namespace App\Repositories\Rate;

use Exception;
use App\Models\Rate;


class RateRepository implements RateRepoInterface
{
    public function get()
    {
        return Rate::all();
    }

    public function show($id)
    {
        return $data = Rate::where('id', $id)->first();
    }
}
