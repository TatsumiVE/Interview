<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      Position::create([
         'name' => 'Senior HR',
         'department_id' => 1
      ]);

      Position::create([
         'name' => 'Senior PM',
         'department_id' => 2
      ]);

      Position::create([
         'name' => 'Senior Engineer',
         'department_id' => 3
      ]);

      Position::create([
         'name' => 'Junior Engineer',
         'department_id' => 3
      ]);
   }
}
