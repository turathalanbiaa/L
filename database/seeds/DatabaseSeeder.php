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
//             UsersTableSeeder::class

             IssuesTableSeeder::class,
             LecturersTableSeeder::class,
             StudyCoursesTableSeeder::class,
             GeneralCoursesHeadersTableSeeder::class,
             GeneralCoursesTableSeeder::class,
             DocumentsTableSeeder::class,
             NotesTableSeeder::class,
             AnnouncementsTableSeeder::class,
             ConvertUsersTableSeeder::class
         ]);
    }
}
