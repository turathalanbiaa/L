<?php

use Illuminate\Database\Seeder;
use Website\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 250)->create();
    }
}
