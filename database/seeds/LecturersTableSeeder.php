<?php

use App\Models\Lecturer;
use Illuminate\Database\Seeder;

class LecturersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Lecturer::class, 100)->create();
    }
}
