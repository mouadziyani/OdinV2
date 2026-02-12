<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create admin user
        $admin = User::firstOrCreate(
            ['email' => 'admin@odin.com'],
            [
                'name' => 'Admin Odin',
                'password' => Hash::make('password123'),
            ]
        );


        $role = Role::where('name', 'admin')->first();

        if ($role) {
            $admin->roles()->attach($role->id);
        }
    }
}
