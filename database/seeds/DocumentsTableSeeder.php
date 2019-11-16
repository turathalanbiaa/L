<?php

use Illuminate\Database\Seeder;
use Website\Models\Document;

class DocumentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Document::class, 100)->create();
    }
}
