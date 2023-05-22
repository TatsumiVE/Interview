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
            'position_id' => 1,
        ]);

        Interviewer::create([
            'name' => 'Mary',
            'position_id' => 2,
        ]);

        Interviewer::create([
            'name' => 'Esther',
            'position_id' => 3,

        ]);
    }
}
