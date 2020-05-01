<?php

use App\Models\GeneralCourse;
use Illuminate\Database\Seeder;

class GeneralCoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        factory(GeneralCourse::class, 100)->create();
    }
}
