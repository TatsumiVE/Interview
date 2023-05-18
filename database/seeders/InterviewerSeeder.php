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
            'name' => 'HR',
            'position_id' => 1,
        ]);

        Interviewer::create([
            'name' => 'Management',
            'position_id' => 2,
        ]);

        Interviewer::create([
            'name' => 'Manager',
            'position_id' => 3,
        ]);
    }
}
