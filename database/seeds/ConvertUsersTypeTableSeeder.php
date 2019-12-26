<?php

use Illuminate\Database\Seeder;
use Website\Models\ConvertUserType;

class ConvertUsersTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ConvertUserType::class, 75)->create();
    }
}
