<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'makeProject']);


        $role = Role::create(['name' => 'Werknemer']);
        $role->givePermissionTo('makeProject');

        $role = Role::create(['name' => 'Admin']);
        $role->givePermissionTo(Permission::all());

        Role::create(['name' => 'Default']);
    }
}
