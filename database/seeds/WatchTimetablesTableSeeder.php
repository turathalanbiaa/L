<?php

use App\Models\WatchTimetable;
use Illuminate\Database\Seeder;

class WatchTimetablesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(WatchTimetable::class, 1000)->create();
    }
}
