<?php

use App\Models\WatchedTimetable;
use Illuminate\Database\Seeder;

class WatchedTimetablesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(WatchedTimetable::class, 1000)->create();
    }
}
