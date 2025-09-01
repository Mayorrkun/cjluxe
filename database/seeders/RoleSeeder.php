<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $admin_role = Role::create(['name' => 'admin']);
        $user_role = Role::create(['name' => 'user']);

        $user_permissions =[Permission::create(['name' => 'has cart']),
            Permission::create(['name' => 'owns order']),
            Permission::create(['name' => 'add to cart']),
            Permission::create(['name' => 'remove from cart']),
            Permission::create(['name' => 'checkout'])];

        $admin_permissions =[Permission::create(['name' => 'view orders']),
            Permission::create(['name' => 'view customers']),
            Permission::create(['name' => 'view products']),
            Permission::create(['name' => 'create a product']),
            Permission::create(['name' => 'delete a product']),
            Permission::create(['name' => 'edit a product']),
            Permission::create(['name' => 'assign admin']),
            Permission::create(['name' => 'remove admin']),
            Permission::create(['name' => 'delete user']),];

        $admin_role->givePermissionTo($admin_permissions);
        $user_role->givePermissionTo($user_permissions);
    }
}
