<?php

namespace Database\Seeders;

use App\Models\Rate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rate::create([
            'name' => 'Well'
        ]);

        Rate::create([
            'name' => 'Good'
        ]);

        Rate::create([
            'name' => 'Acceptable'
        ]);

        Rate::create([
            'name' => 'UnAcceptable'
        ]);

        Rate::create([
            'name' => 'Nill'
        ]);
    }
}
