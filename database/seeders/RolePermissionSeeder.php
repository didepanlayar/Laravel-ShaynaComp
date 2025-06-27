<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         * Super Admin seeder
         */
        $permissions = [
            'Manage Statistics',
            'Manage Products',
            'Manage Principles',
            'Manage Testimonials',
            'Manage Clients',
            'Manage Teams',
            'Manage Abouts',
            'Manage Appointments',
            'Manage Hero sections',
        ];

        foreach($permissions as $permission) {
            Permission::firstOrCreate(
                [
                    'name' => $permission
                ]
            );
        }

        $superAdminRole = Role::firstOrCreate(
            [
                'name' => 'super_admin'
            ]
        );

        $user = User::create(
            [
                'name' => 'ShaynaComp',
                'email' => 'shaynacomp@email.com',
                'password' => Hash::make("Demo123!")
            ]
        );

        $user->assignRole($superAdminRole);

        /**
         * Multi Role seeder example
         */
        $designManagerPermissions = [
            'Manage Products',
            'Manage Prinsiples',
            'Manage Testimonials',
        ];

        $designManagerRole = Role::firstOrCreate(
            [
                'name' => 'design_manager'
            ]
        );

        $designManagerRole->syncPermissions($designManagerPermissions);
    }
}
