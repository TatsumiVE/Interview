<?php

namespace Database\Seeders;

use App\Models\Interview;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InterviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //for candidate 1  stage 1
        // Interview::create([
        //     'interview_summarize' => 'WELL',
        //     'interview_result_date' => '2023-05-04',
        //     'interview_result' => 5,
        //     'record_path' => 'https://docs.google.com/document/d/1j6Z7nIBAqaYVH4u8LD09d2SqCMCLLsogjUrh1t8RguE/edit',
        //     'candidate_id' => 1,
        //     'interview_stage_id' => 1
        // ]);


        // //for candidate 1 stage2
        // Interview::create([
        //     'interview_summarize' => 'NORMAL',
        //     'interview_result_date' => '2023-05-04',
        //     'interview_result' => 5,
        //     'record_path' => 'https://docs.google.com/document/d/1j6Z7nIBAqaYVH4u8LD09d2SqCMCLLsogjUrh1t8RguE/edit',
        //     'candidate_id' => 1,
        //     'interview_stage_id' => 2
        // ]);
    }
}
