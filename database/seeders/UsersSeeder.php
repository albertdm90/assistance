<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'Admin']);

        $permissions = [
            ['name' => 'dashboard.index'],
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission['name']]);
        }

        $admin->givePermissionTo([
            ['name' => 'dashboard.index'],
        ]);

        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@secret.com',
            'password' => Hash::make('admin159*'),
            'email_verified_at' => date('Y-m-d. h:i:s')
        ]);

        $user->assignRole('Admin');
    }
}
