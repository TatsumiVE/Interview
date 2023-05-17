<?php

namespace Database\Seeders;

use App\Models\Agency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AgencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Agency::create([
            'name' => 'Ace'
        ]);
        Agency::create([
            'name' => 'Mahar'
        ]);
        Agency::create([
            'name' => 'JobNet'
        ]);
        Agency::create([
            'name' => 'JobSearch'
        ]);
    }
}
