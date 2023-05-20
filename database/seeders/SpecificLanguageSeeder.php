<?php

namespace Database\Seeders;

use App\Models\SpecificLanguage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecificLanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       SpecificLanguage::create([
        'experience' => '1' ,
        'devlanguage_id' => '1',
        'candidate_id' =>'1'
       ]);

       SpecificLanguage::create([
        'experience' => '6' ,
        'devlanguage_id' => '2',
        'candidate_id' =>'1'
       ]);

       SpecificLanguage::create([
        'experience' => '6' ,
        'devlanguage_id' => '3',
        'candidate_id' =>'1'
       ]);

       SpecificLanguage::create([
        'experience' => '6' ,
        'devlanguage_id' => '1',
        'candidate_id' =>'2'
       ]);

       SpecificLanguage::create([
        'experience' => '6' ,
        'devlanguage_id' => '2',
        'candidate_id' =>'2'
       ]);

       SpecificLanguage::create([
        'experience' => '6' ,
        'devlanguage_id' => '3',
        'candidate_id' =>'2'
       ]);
    }
}
