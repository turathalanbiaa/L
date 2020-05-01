<?php

use App\Models\StudyCourse;
use Illuminate\Database\Seeder;

class StudyCoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        factory(StudyCourse::class, 100)->create();
    }
}
