<?php

use Illuminate\Database\Seeder;
use Website\Models\GeneralCourse;

class GeneralCoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(GeneralCourse::class, 50)->create();
    }
}
