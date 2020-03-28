<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call([
//             UsersTableSeeder::class,

//             LecturersTableSeeder::class,
//             StudyCoursesTableSeeder::class,
//             GeneralCoursesHeadersTableSeeder::class,
//             GeneralCoursesTableSeeder::class,

//             DocumentsTableSeeder::class,
//             AnnouncementsTableSeeder::class,
//             ConvertUsersTypeTableSeeder::class,

             // Hard Code
             AdminsTableSeeder::class,
             RolesTableSeeder::class,
             AdminsRolesTableSeeder::class
         ]);
    }
}
