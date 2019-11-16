<?php

use Illuminate\Database\Seeder;
use Website\Models\StudyCourse;

class StudyCoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(StudyCourse::class, 50)->create();
    }
}
