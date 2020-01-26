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
        // AdminRepository role
        factory(Role::class)->create([
            "name" => "Admin",
            "description" => "Manage admins",
            "created_at" => date("Y-m-d")
        ]);

        // User role
        factory(Role::class)->create([
            "name" => "User",
            "description" => "Manage users",
            "created_at" => date("Y-m-d")
        ]);

        // Document role
        factory(Role::class)->create([
            "name" => "Document",
            "description" => "Manage students (Users) documents",
            "created_at" => date("Y-m-d")
        ]);

        // Convert account type role
        factory(Role::class)->create([
            "name" => "ConvertAccountType",
            "description" => "Manage user requests to change the account type",
            "created_at" => date("Y-m-d")
        ]);

        // Announcement role
        factory(Role::class)->create([
            "name" => "Announcement",
            "description" => "Manage announcements",
            "created_at" => date("Y-m-d")
        ]);
    }
}
