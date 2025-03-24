<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'no_hp' => '08123456789',
            'email' => 'admin@gmail.com',
            'password'=> bcrypt('123'),
            'id_level'=> '1',
        ]);

        User::factory()->create([
            'name'=> 'Kasir',
            'no_hp'=> '08123456789',
            'email'=> 'kasir@gmail.com',
            'password'=> bcrypt('123'),
            'id_level'=> '1',
            ]);
    }
}
