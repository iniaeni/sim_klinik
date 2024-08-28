<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'name' => 'admin',
            'email'=> 'admin@gmail.com',
            'password'=> bcrypt('12345'),
            'role' => 'admin',
        ]);
        
        User::create([
            'name' => 'pasien',
            'email'=> 'pasien@gmail.com',
            'password'=> bcrypt('12345'),
            'role' => 'pasien',
        ]);

        User::create([
            'name' => 'dokter',
            'email'=> 'dokter@gmail.com',
            'password'=> bcrypt('12345'),
            'role' => 'dokter',
        ]);
    }
}
