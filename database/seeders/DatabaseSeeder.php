<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Ruangan;
use App\Models\Inventaris;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{

    
    public function run(): void
    {

   $this->call(UserSeeder::class);

          // Membuat 10 user random
        \App\Models\User::factory(10)->create();
        
        // Membuat user spesifik
        \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin123'),
        ]);


        // Seed User Admin
        User::create([
            'name' => 'Admin Auditorium',
            'email' => 'admin@auditorium.com',
            'password' => Hash::make('password123'),
            'role' => 'admin'
        ]);

        // Seed Ruangan Auditorium
        Ruangan::create([
            'nama' => 'Auditorium Utama',
            'gedung' => 'Gedung B2',
            'lantai' => 1,
            'kapasitas' => 150,
            'tipe' => 'auditorium',
            'fasilitas' => json_encode([
                'LCD Projector',
                'Sound System',
                'Kursi Theater',
                'Podium',
                'AC',
                'WiFi'
            ])
        ]);

        // Seed Inventaris
        Inventaris::create([
            'nama' => 'LCD Projector',
            'kode' => 'INV-PJ001',
            'jumlah' => 2,
            'kondisi' => 'baik'
        ]);

        Inventaris::create([
            'nama' => 'Microphone',
            'kode' => 'INV-MIC001',
            'jumlah' => 4,
            'kondisi' => 'baik'
        ]);
    }

     // User::factory(10)->create();

        //User::factory()->create([
            //'name' => 'Test User',
            //'email' => 'test@example.com',
        //]);

        
}