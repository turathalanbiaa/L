<?php

use App\Models\WatchedLesson;
use Illuminate\Database\Seeder;

class WatchedLessonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(WatchedLesson::class, 1000)->create();
    }
}
