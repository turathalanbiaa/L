<?php

use App\Models\ENotebook;
use Illuminate\Database\Seeder;

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
