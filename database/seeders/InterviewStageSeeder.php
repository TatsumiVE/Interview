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
        InterviewStage::create([
            'stage_name' => '1',
            'interview_date' => '2023-05-04',
            'interview_time' => '03:06:23',
            'location' => 'Online',
        ]);

        InterviewStage::create([
            'stage_name' => '2',
            'interview_date' => '2023-06-04',
            'interview_time' => '03:06:23',
            'location' => 'Online',
        ]);
    }
}
