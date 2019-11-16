<?php

use Illuminate\Database\Seeder;
use Website\Models\Note;

class NotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Note::class, 100)->create();
    }
}
