<?php

namespace App\Repositories\Agency;

use App\Models\Agency;
use Illuminate\Support\Facades\DB;

class AgencyRepository implements AgencyRepoInterface
{
  public function get()
  {

    return Agency::all()->where('del_flg', 1);
  }
  public function show($id)
  {
    return Agency::where('id', $id)->first()->where('del_flg', 1);
  }

  public function destroy($id)
  {
    // return DB::table('agencies')->where("id", $id)->update([
    //   'del_flg' => 0

    // ]);

    return Agency::where('id', $id)->update(['del_flg' => 0]);
  }
}
