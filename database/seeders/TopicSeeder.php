<?php

namespace Database\Seeders;

use App\Models\Topic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TopicSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Topic::create([
      'name' => 'Language Proficiency'
    ]);

    Topic::create([
      'name' => 'Interest on Company&Job'
    ]);

    Topic::create([
      'name' => ' Sociability'
    ]);

    Topic::create([
      'name' => 'Work Experience'
    ]);

    Topic::create([
      'name' => 'Self Confidence'
    ]);

    Topic::create([
      'name' => 'Qualification'
    ]);
  }
}
