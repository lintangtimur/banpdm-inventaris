<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cache permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // ===== 1. Define Permissions =====
        $permissions = [
            // Master Permissions
            'create unit',
            'edit unit',
            'delete unit',

            'create category',
            'edit category',
            'delete category',

            'create item',
            'edit item',
            'delete item',

            // Transaction History
            'create transaction',
            'edit transaction',

            //management users
            'create user',
            'edit user',
            'delete user',

            //management role
            'create role',
            'edit role',
            'delete role',

            // PDF Exports
            'export stock pdf',
            'export transaction pdf',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // ===== 2. Create Roles =====
        $superadmin = Role::firstOrCreate(['name' => 'superadmin']);
        $admin = Role::firstOrCreate(['name' => 'admin']);

        // ===== 3. Assign Permissions =====

        // Superadmin gets all
        $superadmin->syncPermissions(Permission::all());

        // Admin only gets limited permissions
        $admin->syncPermissions([
            'create transaction',
            'edit transaction',
            'export stock pdf',
        ]);

        // ===== 4. Create Users and Assign Roles =====
        $superadminUser = User::firstOrCreate(
            ['email' => 'superadmin@example.com'],
            [
                'name' => 'lintang',
                'password' => Hash::make('lintangbanpdm'), // ganti kalau perlu
            ]
        );
        $superadminUser->assignRole($superadmin);

        $adminUser = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'maria',
                'password' => Hash::make('mariabanpdm'), // ganti juga
            ]
        );
        $adminUser->assignRole($admin);
    }
}
