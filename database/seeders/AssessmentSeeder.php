<?php

namespace Database\Seeders;

use App\Models\Assessment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssessmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Assessment::create([
            'candidate_id' => 1,
            'interviewer_id' => 1,
            'interview_stage_id' => 1
        ]);

        Assessment::create([
            'candidate_id' => 2,
            'interviewer_id' => 2,
            'interview_stage_id' => 2
        ]);
    }
}
