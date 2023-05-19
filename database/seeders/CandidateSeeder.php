<?php

namespace Database\Seeders;

use App\Models\Candidate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CandidateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Candidate::create([
            'name'  => 'Mama',
            'email' => 'mama@gmail.com',
            'gender' => 1,
            'phone_number' => '09898989',
            'residential_address' => 'YGN',
            'date_of_birth' => 23-2-2000,
            'cv_path' => 'http://127.0.0.1:8000/',
            'position_id'=> 1,
            'agency_id' => 1,
        ]);

        Candidate::create([
            'name'  => 'Mgmg',
            'email' => 'mgmg@gmail.com',
            'gender' => 0,
            'phone_number' => '09898989',
            'residential_address' => 'MDY',
            'date_of_birth' => 23-4-2000,
            'cv_path' => 'http://127.0.0.1:8000/',
            'position_id'=> 2,
            'agency_id' => 2,
        ]);
    }
}
