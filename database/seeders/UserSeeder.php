<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Bendahara',
            'email' => 'bendahara@gmail.com',
            'password' => bcrypt('123'),
            'no_hp' => '081234567890',
            'divisi' => 'IT',
            'jabatan' => 'Bendahara',
            'alamat' => 'Jl. Jalan',
            'is_active' => 1,
            'role_id' => 1,
        ]);

        User::create([
            'name' => 'Manajer',
            'email' => 'manajer@gmail.com',
            'password' => bcrypt('123'),
            'no_hp' => '081234567890',
            'divisi' => 'IT',
            'jabatan' => 'Manajer',
            'alamat' => 'Jl. Jalan',
            'is_active' => 1,
            'role_id' => 2,
        ]);

        User::create([
            'name' => 'Pemeriksa',
            'email' => 'pemeriksa@gmail.com',
            'password' => bcrypt('123'),
            'no_hp' => '081234567890',
            'divisi' => 'IT',
            'jabatan' => 'Pemeriksa',
            'alamat' => 'Jl. Jalan',
            'is_active' => 0,
            'role_id' => 3,
        ]);

        User::create([
            'name' => 'Pengaju',
            'email' => 'pengaju@gmail.com',
            'password' => bcrypt('123'),
            'no_hp' => '081234567890',
            'divisi' => 'IT',
            'jabatan' => 'Pengurus',
            'alamat' => 'Jl. Jalan',
            'is_active' => 0,
            'role_id' => 4,
        ]);
    }
}
