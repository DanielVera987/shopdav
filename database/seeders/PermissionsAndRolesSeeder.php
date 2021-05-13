<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsAndRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'index categories']);
        Permission::create(['name' => 'create categories']);
        Permission::create(['name' => 'edit categories']);
        Permission::create(['name' => 'delete categories']);

        Permission::create(['name' => 'index brand']);
        Permission::create(['name' => 'create brand']);
        Permission::create(['name' => 'edit brand']);
        Permission::create(['name' => 'delete brand']);

        Permission::create(['name' => 'index coupons']);
        Permission::create(['name' => 'create coupons']);
        Permission::create(['name' => 'edit coupons']);
        Permission::create(['name' => 'delete coupons']);

        Permission::create(['name' => 'index discount']);
        Permission::create(['name' => 'create discount']);
        Permission::create(['name' => 'edit discount']);
        Permission::create(['name' => 'delete discount']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'super-admin']);

        $role2 = Role::create(['name' => 'user']);
            $role2->givePermissionTo('index categories');
            $role2->givePermissionTo('index brand');
            $role2->givePermissionTo('index discount');

        // create demo users
        $user = \App\Models\User::factory()->create([
            'name' => 'Super Admin',
            'surname' => 'admin',
            'email' => 'admin@admin.com',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => 'User',
            'surname' => 'user',
            'email' => 'user@user.com',
        ]);
        $user->assignRole($role2);
    }
}
