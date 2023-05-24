<?php

namespace Database\Seeders;

use App\Models\Interviewer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InterviewerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Interviewer::create([
            'name' => 'John',
            'email'=>'john@gmail.com',
            'department_id' => 1,
            'position_id'=>1,
        ]);

        Interviewer::create([
            'name' => 'David',
            'email'=>'david@gmail.com',
            'department_id' => 2,
            'position_id'=>2,
        ]);

        Interviewer::create([
            'name' => 'Mary',
            'email'=>'mary@gmail.com',
            'department_id' => 3,
            'position_id'=>4,            
         ]);
    }
}
