<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admin role
        factory(Role::class)->create([
            "name"        => "Admin"
        ]);

        // User role
        factory(Role::class)->create([
            "name"        => "User"
        ]);

        // Document role
        factory(Role::class)->create([
            "name"        => "Document"
        ]);

        // Convert account type role
        factory(Role::class)->create([
            "name"        => "Convert Account Type"
        ]);

        // Announcement role
        factory(Role::class)->create([
            "name"        => "Announcement"
        ]);

        // Lecturer role
        factory(Role::class)->create([
            "name"        => "Lecturer"
        ]);
    }
}
