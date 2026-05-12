<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            'view posts',
            'create posts',
            'edit any post',
            'edit own post',
            'delete any post',
            'delete own post',
            'publish posts',
            'manage categories',
            'manage tags',
            'manage comments',
            'manage users',
            'manage roles',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $superAdmin = Role::firstOrCreate(['name' => 'Super Admin']);
        $superAdmin->givePermissionTo(Permission::all());

        $editor = Role::firstOrCreate(['name' => 'Editor']);
        $editor->givePermissionTo([
            'view posts',
            'create posts',
            'edit any post',
            'edit own post',
            'delete any post',
            'delete own post',
            'publish posts',
            'manage categories',
            'manage tags',
            'manage comments',
        ]);

        $journalist = Role::firstOrCreate(['name' => 'Journalist']);
        $journalist->givePermissionTo([
            'view posts',
            'create posts',
            'edit own post',
            'delete own post',
        ]);

        $user = Role::firstOrCreate(['name' => 'User']);
        $user->givePermissionTo([
            'view posts',
        ]);
    }
}
