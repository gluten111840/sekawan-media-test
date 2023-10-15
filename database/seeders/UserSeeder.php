<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.net',
            'password' => 'password',
            'role_id' => 1,
        ]);
        User::create([
            'name' => 'Akseptor',
            'email' => 'akseptor@example.net',
            'password' => 'password',
            'role_id' => 2,
        ]);
    }
}
