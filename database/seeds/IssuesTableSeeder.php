<?php

use Illuminate\Database\Seeder;
use Website\Models\Issue;

class IssuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Issue::class, 100)->create();
    }
}
