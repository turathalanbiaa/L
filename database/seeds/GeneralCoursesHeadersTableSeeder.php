<?php

use Illuminate\Database\Seeder;
use Website\Models\GeneralCourseHeader;

class GeneralCoursesHeadersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(GeneralCourseHeader::class, 10)->create();
    }
}
