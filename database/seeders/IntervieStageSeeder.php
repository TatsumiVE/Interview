<?php
namespace Database\Seeders;

use App\Models\InterviewStage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IntervieStageSeeder extends Seeder
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

        InterviewStage::create([
            'stage_name' => '3',
            'interview_date' => '2023-07-04',
            'interview_time' => '03:06:23',
            'location' => 'Inperson',
        ]);
    }
}
