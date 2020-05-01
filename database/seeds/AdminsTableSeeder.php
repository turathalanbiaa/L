<?php

use App\Enum\Language;
use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        // Arabic Admin
        factory(Admin::class)->create([
            "name"           => "عماد وهاب الكعبي",
            "lang"           => Language::ARABIC,
            "username"       => "emad.ar@gmail.com",
            "password"       => md5("12341234"),
            "created_at"     => date("Y-m-d"),
            "last_login"     => null,
            "remember_token" => null
        ]);

        // English Admin
        factory(Admin::class)->create([
            "name"           => "Emad Al-Kabi",
            "lang"           => Language::ENGLISH,
            "username"       => "emad.en@gmail.com",
            "password"       => md5("12341234"),
            "created_at"     => date("Y-m-d"),
            "last_login"     => null,
            "remember_token" => null
        ]);
    }
}
