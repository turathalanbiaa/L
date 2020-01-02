<?php

use App\Models\ConvertUserType;
use Illuminate\Database\Seeder;

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
