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
            'name' => 'Mobile Developer',
            'department_id'=> 1
         ]);

         Position::create([
            'name' => 'Android Developer',
            'department_id'=> 2
         ]);

         Position::create([
            'name' => 'Web Developer',
            'department_id'=> 3
         ]);


    }
}
