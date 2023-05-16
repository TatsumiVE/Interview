<?php

namespace App\Repositories\Position;

use App\Models\Position;

class PositionRepository implements PositionRepoInterface
{
  public function get(){
    return Position::with('department')->get();
  }
  public function show($id){
    return Position::with('department')->where('id',$id)->first();
  }

}
