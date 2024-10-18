<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create roles
        $adminRole = Role::create(['name' => 'Admin']);
        $employeeRole = Role::create(['name' => 'Employee']);
        $customerRole = Role::create(['name' => 'Customer']);

        // Create users
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'role_id' => $adminRole->id, // Assign admin role to user
        ]);

        $tim = User::create([
            'name' => 'Tim',
            'email' => 'tim@example.com',
            'password' => bcrypt('password'),
            'role_id' => $adminRole->id, // Assign admin role to user
        ]);

        $kevin = User::create([
            'name' => 'Kevin',
            'email' => 'kevin@example.com',
            'password' => bcrypt('password'),
            'role_id' => $adminRole->id, // Assign admin role to user
        ]);

        $employee = User::create([
            'name' => 'Employee User',
            'email' => 'employee@example.com',
            'password' => bcrypt('password'),
            'role_id' => $employeeRole->id, // Assign employee role to user
        ]);

        $customer = User::create([
            'name' => 'Customer',
            'email' => 'customer@example.com',
            'password' => bcrypt('customer'),
            'role_id' => $customerRole->id,
        ]);
    }
}
