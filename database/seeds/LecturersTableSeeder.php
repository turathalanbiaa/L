<?php

use Illuminate\Database\Seeder;
use Website\Models\Lecturer;

class LecturersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Lecturer::class, 50)->create();
    }
}
