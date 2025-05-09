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

        $instructoreRolePermissions = [
            'view_dashboard_instructor',
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

        foreach ($instructoreRolePermissions as $permission) {
            Permission::firstOrCreate(
                ['name' => $permission, 'guard_name' => 'web']
            );
        }

        $adminRoleWeb = Role::firstOrCreate(['name' => 'Admin', 'guard_name' => 'admin']);
        $userRoleWeb = Role::firstOrCreate(['name' => 'Student', 'guard_name' => 'web']);
        $instructorRoleWeb = Role::firstOrCreate(['name' => 'Instructor', 'guard_name' => 'web']);

        $adminRoleWeb->givePermissionTo($adminRolePermissions);
        $userRoleWeb->givePermissionTo($studentRolePermissions);
        $instructorRoleWeb->givePermissionTo($instructoreRolePermissions);

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

        $instructor = User::create([
            'name' => 'Instructor',
            'email' => 'instructor@local.gg',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        $admin->assignRole($adminRoleWeb);
        $user->assignRole($userRoleWeb);
        $instructor->assignRole($instructorRoleWeb);
    }
}
