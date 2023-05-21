<?php

namespace Database\Seeders;

use App\Models\Remark;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RemarkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //for candidate 1  stage 1
        Remark::create([
            'comment' => 'This person is well',
            'grade' => 1,
            'interview_stage_id' => 1,
            'interview_assign_id' => 1
        ]);

        Remark::create([
            'comment' => 'This person is good',
            'grade' => 2,
            'interview_stage_id' => 1,
            'interview_assign_id' => 2
        ]);

        Remark::create([
            'comment' => 'This person is well',
            'grade' => 3,
            'interview_stage_id' => 1,
            'interview_assign_id' => 3
        ]);


        //for candidate 1  stage 2
        Remark::create([
            'comment' => 'This person is well',
            'grade' => 3,
            'interview_stage_id' => 2,
            'interview_assign_id' => 4
        ]);

        Remark::create([
            'comment' => 'This person is well',
            'grade' => 3,
            'interview_stage_id' => 2,
            'interview_assign_id' => 5
        ]);

        Remark::create([
            'comment' => 'This person is well',
            'grade' => 3,
            'interview_stage_id' => 2,
            'interview_assign_id' => 6
        ]);

        //for candidate 2 stage 1
        Remark::create([
            'comment' => 'This person is well',
            'grade' => 3,
            'interview_stage_id' => 1,
            'interview_assign_id' => 7
        ]);

        Remark::create([
            'comment' => 'This person is well',
            'grade' => 3,
            'interview_stage_id' => 1,
            'interview_assign_id' => 8
        ]);

        Remark::create([
            'comment' => 'This person is well',
            'grade' => 3,
            'interview_stage_id' => 1,
            'interview_assign_id' => 9
        ]);
    }
}
