<?php

use App\Models\WatchLaterLesson;
use Illuminate\Database\Seeder;

class WatchLaterLessonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(WatchLaterLesson::class, 1000)->create();
    }
}
