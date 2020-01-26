<?php

use App\Models\GeneralCourseHeader;
use Illuminate\Database\Seeder;

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
