<?php

use Illuminate\Database\Seeder;
use Website\Models\Announcement;

class AnnouncementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Announcement::class, 250)->create();
    }
}
