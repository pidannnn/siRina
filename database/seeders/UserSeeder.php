<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        
        
        // Buat user manual

        // Bisa bikin satu akun dengan email & password tetap
    User::create([
        'name' => 'User Tes',
        'email' => 'user@example.com',
        'password' => Hash::make('password'),
        // 'usertype' => 'user',
    ]);

        User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@example.com',
            'password' => Hash::make('superadmin123'),
            'role' => 'admin', 
        ]);
        
        
        // Atau buat banyak user sekaligus
        $users = [
            ['name' => 'User 1', 'email' => 'user1@example.com', 'password' => Hash::make('password')],
            ['name' => 'User 2', 'email' => 'user2@example.com', 'password' => Hash::make('password')],
            // tambahkan lebih banyak user jika diperlukan
        ];
        
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
