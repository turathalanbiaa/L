<?php

use App\Models\Timetable;
use Illuminate\Database\Seeder;

class TimetablesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Timetable::class, 1000)->create();
    }
}
