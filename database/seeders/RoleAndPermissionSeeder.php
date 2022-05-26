<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = ['crud-users', 'crud-categories', 'crud-articles'];
        $roles = ['admin', 'author'];

        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        Role::where('name', 'admin')->first()->givePermissionTo(Permission::all());
        Role::where('name', 'author')->first()->givePermissionTo(Permission::whereIn('name', ['crud-articles', 'crud-categories'])->get());

    }
}
