<?php

namespace Database\Seeders;

use App\Models\Devlanguage;
use App\Models\Language as ModelsLanguage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use JetBrains\PhpStorm\Language;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Devlanguage::create([
            'name' => 'C++',

        ]);

        Devlanguage::create([
            'name' => 'Java',

        ]);

        Devlanguage::create([
            'name' => 'JS',

        ]);

        Devlanguage::create([
            'name' => 'Python',

        ]);

        Devlanguage::create([
            'name' => 'C#',

        ]);
    }
}
