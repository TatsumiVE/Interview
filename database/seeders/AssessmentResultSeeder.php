<?php

namespace Database\Seeders;

use App\Models\AssessmentResult;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssessmentResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AssessmentResult::create([
            'topic_id' => 1,
            'rate_id' => 1,
            'assessment_id' => 1,
        ]);
        AssessmentResult::create([
            'topic_id' => 2,
            'rate_id' => 2,
            'assessment_id' => 1,
        ]);
        AssessmentResult::create([
            'topic_id' => 3,
            'rate_id' => 3,
            'assessment_id' => 1,
        ]);

        AssessmentResult::create([
            'topic_id' => 4,
            'rate_id' => 4,
            'assessment_id' => 1,
        ]);
        AssessmentResult::create([
            'topic_id' => 5,
            'rate_id' => 5,
            'assessment_id' => 1,
        ]);


        AssessmentResult::create([
            'topic_id' => 1,
            'rate_id' => 1,
            'assessment_id' => 2,
        ]);
        AssessmentResult::create([
            'topic_id' => 2,
            'rate_id' => 2,
            'assessment_id' => 2,
        ]);
        AssessmentResult::create([
            'topic_id' => 3,
            'rate_id' => 3,
            'assessment_id' => 2,
        ]);

        AssessmentResult::create([
            'topic_id' => 4,
            'rate_id' => 4,
            'assessment_id' => 2,
        ]);
        AssessmentResult::create([
            'topic_id' => 5,
            'rate_id' => 5,
            'assessment_id' => 2,
        ]);


        AssessmentResult::create([
            'topic_id' => 1,
            'rate_id' => 1,
            'assessment_id' => 3,
        ]);
        AssessmentResult::create([
            'topic_id' => 2,
            'rate_id' => 2,
            'assessment_id' => 3,
        ]);
        AssessmentResult::create([
            'topic_id' => 3,
            'rate_id' => 3,
            'assessment_id' => 3,
        ]);

        AssessmentResult::create([
            'topic_id' => 4,
            'rate_id' => 4,
            'assessment_id' => 3,
        ]);
        AssessmentResult::create([
            'topic_id' => 5,
            'rate_id' => 5,
            'assessment_id' => 3,
        ]);
    }
}
