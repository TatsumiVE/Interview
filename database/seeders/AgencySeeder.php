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
        $hrAdmin = Agency::create([
            'name' => 'Ace'
        ]);
        $hrAdmin = Agency::create([
            'name' => 'Mahar'
        ]);
        $hrAdmin = Agency::create([
            'name' => 'JobNet'
        ]);
        $hrAdmin = Agency::create([
            'name' => 'JobSearch'
        ]);
    }
}
