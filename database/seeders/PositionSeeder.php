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
      ]);

      Position::create([
         'name' => 'Senior PM',        
      ]);

      Position::create([
         'name' => 'Senior Engineer',       
      ]);

      Position::create([
         'name' => 'Junior Engineer',
      ]);
   }
}
