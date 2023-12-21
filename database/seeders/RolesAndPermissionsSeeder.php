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
        Permission::create(['name' => 'viewPages']);


        Role::create(['name' => 'Werknemer'])
            ->givePermissionTo('makeProject')
            ->givePermissionTo('viewPages');

        Role::create(['name' => 'Admin'])
            ->givePermissionTo(Permission::all());

        Role::create(['name' => 'Gast']);
    }
}
