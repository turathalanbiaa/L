<?php

use App\Models\Admin;
use App\Models\AdminRole;
use App\Models\Role;
use Illuminate\Database\Seeder;

class AdminsRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins = Admin::all();
        $roles = Role::all();

        foreach ($admins as $admin) {
            foreach ($roles as $role) {
                factory(AdminRole::class)->create([
                    "admin_id"   => $admin->id,
                    "role_id"    => $role->id
                ]);
            }
        }
    }
}
