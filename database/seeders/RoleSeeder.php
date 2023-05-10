<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Role::truncate();
        Schema::enableForeignKeyConstraints();

        $roles = [
            [
                'role_name' => 'Bendahara',
            ],
            [
                'role_name' => 'Manajer',
            ],
            [
                'role_name' => 'Pemeriksa',
            ],
            [
                'role_name' => 'Pengurus',
            ],
        ];

        foreach ($roles as $role) {
            \App\Models\Role::create($role);
        }

        
    }
}
