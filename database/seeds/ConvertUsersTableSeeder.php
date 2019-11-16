<?php

use Illuminate\Database\Seeder;
use Website\Models\ConvertUser;

class ConvertUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ConvertUser::class, 75)->create();
    }
}
