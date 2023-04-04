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
            'password' => bcrypt('bendahara123'),
            'no_hp' => '081234567890',
            'divisi' => 'Keuangan',
            'jabatan' => 'Bendahara I',
            'alamat' => 'Jl. Jalanin aja dulu',
            'is_active' => 1,
            'role_id' => 1,
        ]);

        // User::create([
        //     'name' => 'Manajer',
        //     'email' => 'manajer@gsc.ac.id',
        //     'password' => bcrypt('manajer123'),
        //     'no_hp' => '081234567890',
        //     'divisi' => 'HRD',
        //     'jabatan' => 'Manajer HRD',
        //     'alamat' => 'Jl. Bareng ga jadian',
        //     'is_active' => 1,
        //     'role_id' => 2,
        // ]);

        // User::create([
        //     'name' => 'Pemeriksa',
        //     'email' => 'pemeriksa@gcs.ac.id',
        //     'password' => bcrypt('pemeriksa123'),
        //     'no_hp' => '081234567890',
        //     'divisi' => 'Audit Internal',
        //     'jabatan' => 'Pemeriksa',
        //     'alamat' => 'Jl. Buntu bersama mu',
        //     'is_active' => 0,
        //     'role_id' => 3,
        // ]);

        // User::create([
        //     'name' => 'Pengaju',
        //     'email' => 'sulthan@gsc.ac.id',
        //     'password' => bcrypt('sulthan123'),
        //     'no_hp' => '081234567890',
        //     'divisi' => 'Development Team',
        //     'jabatan' => 'Mobile Developer',
        //     'alamat' => 'Jl. Doang kagak jadian',
        //     'is_active' => 0,
        //     'role_id' => 4,
        // ]);
    }
}
