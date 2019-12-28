<?php

use Illuminate\Database\Seeder;
use Website\Models\ENotebook;

class ENotebooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ENotebook::class, 100)->create();
    }
}
