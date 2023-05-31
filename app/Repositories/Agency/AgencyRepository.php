<?php

namespace App\Repositories\Agency;

use App\Models\Agency;
use Illuminate\Support\Facades\DB;

class AgencyRepository implements AgencyRepoInterface
{
  public function get()
  {

    return Agency::orderBy('id')->get();
  }
  public function show($id)
  {
    return Agency::where('id', $id)->first();
  }
}
