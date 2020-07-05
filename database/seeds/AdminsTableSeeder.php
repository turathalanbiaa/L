<?php

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Admin::class)->create([
            "name"           => "Emad Al-Kabi",
            "username"       => "emadalkabi1994@gmail.com",
            "password"       => md5("12341234"),
            "last_login"     => null
        ]);
    }
}
