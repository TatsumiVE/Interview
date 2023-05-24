<?php

namespace App\Repositories\Position;

use App\Models\Position;

class PositionRepository implements PositionRepoInterface
{
  public function get(){
    return Position::all();
  }
  public function show($id){
    return Position::where('id',$id)->first();
  }

}
