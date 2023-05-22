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
            'date_of_birth' => '23 - 2 - 2000',
            'cv_path' => 'https://docs.google.com/document/d/1xiuQL4q33yNLOIc88omGHRJsdOWEa3OHSPtp8vit_aI/edit',
            'position_id' => 1,
            'agency_id' => 1,
            'status' => 1



        ]);

        Candidate::create([
            'name'  => 'Mgmg',
            'email' => 'mgmg@gmail.com',
            'gender' => 2,
            'phone_number' => '09898989',
            'residential_address' => 'MDY',
            'date_of_birth' => '23 - 4 - 2000',
            'cv_path' => 'https://docs.google.com/document/d/1xiuQL4q33yNLOIc88omGHRJsdOWEa3OHSPtp8vit_aI/edit',
            'position_id' => 2,
            'agency_id' => 2,
            'status' => 1

        ]);
    }
}
