<?php
namespace Database\Seeders;

use App\Models\InterviewStage;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InterviewStageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //stage name 1 for first stage, stage name 2 for second stage, stage name 3 for third stage

        //location 1 for online and location 2 for inperson
        // InterviewStage::create([
        //     'stage_name' => 1,
        //     'interview_date' => '2023-05-04',
        //     'interview_time' => '03:06:23',
        //     'location' => '1',
        // ]);

        // InterviewStage::create([
        //     'stage_name' => 2,
        //     'interview_date' => '2023-06-04',
        //     'interview_time' => '03:06:23',
        //     'location' => '2',
        // ]);
    }
}
