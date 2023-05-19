<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleAndPermissionSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(AgencySeeder::class);
        $this->call(LanguageSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(TopicSeeder::class);
        $this->call(RateSeeder::class);
        $this->call(PositionSeeder::class);
        $this->call(SpecificLanguageSeeder::class);
        $this->call(CandidateSeeder::class);
        $this->call(InterviewerSeeder::class);
        $this->call(AssessmentSeeder::class);
        $this->call(IntervieStageSeeder::class);
        $this->call(RemarkSeeder::class);
        $this->call(InterviewAssignSeeder::class);
        $this->call(InterviewSeeder::class);
    }
}
