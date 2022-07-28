<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin',
            'user_name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password')
        ]);

        $admin->assignRole('admin');

        $developer = User::create([
            'name' => 'Developer',
            'user_name' => 'dev',
            'email' => 'developer@gmail.com',
            'password' => bcrypt('password')
        ]);

        $developer->assignRole('developer');
    }
}
