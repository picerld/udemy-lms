<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $adminRolePermissions = [
            'view_dashboard_admin',
        ];

        $studentRolePermissions = [
            'view_dashboard_user',
        ];

        $instructureRolePermissions = [
            'view_dashboard_instructure',
        ];

        foreach ($adminRolePermissions as $permission) {
            Permission::firstOrCreate(
                ['name' => $permission, 'guard_name' => 'admin']
            );
        }

        foreach ($studentRolePermissions as $permission) {
            Permission::firstOrCreate(
                ['name' => $permission, 'guard_name' => 'web']
            );
        }

        foreach ($instructureRolePermissions as $permission) {
            Permission::firstOrCreate(
                ['name' => $permission, 'guard_name' => 'web']
            );
        }

        $adminRoleWeb = Role::firstOrCreate(['name' => 'Admin', 'guard_name' => 'admin']);
        $userRoleWeb = Role::firstOrCreate(['name' => 'Student', 'guard_name' => 'web']);
        $instructureRoleWeb = Role::firstOrCreate(['name' => 'Instructure', 'guard_name' => 'web']);

        $adminRoleWeb->givePermissionTo($adminRolePermissions);
        $userRoleWeb->givePermissionTo($studentRolePermissions);
        $instructureRoleWeb->givePermissionTo($instructureRolePermissions);

        $admin = Admin::create([
            'name' => 'Pice',
            'email' => 'admin@local.gg',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        $user = User::create([
            'name' => 'Rafi',
            'email' => 'user@local.gg',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        $instructure = User::create([
            'name' => 'Instructure',
            'email' => 'instructure@local.gg',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        $admin->assignRole($adminRoleWeb);
        $user->assignRole($userRoleWeb);
        $instructure->assignRole($instructureRoleWeb);
    }
}
