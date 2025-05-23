<?php

namespace Database\Seeders;

use App\Models\{
    User,
    Setting
};
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'nama_user' => 'admin',
            'no_hp' => '08123456789',
            'email' => 'admin@gmail.com',
            'password'=> bcrypt('123'),
            'id_level'=> '1',
        ]);

        User::factory()->create([
            'nama_user'=> 'Kasir',
            'no_hp'=> '08123456789',
            'email'=> 'kasir@gmail.com',
            'password'=> bcrypt('123'),
            'id_level'=> '2',
            ]);

        Setting::factory()->create([
            'alamat'=> 'Jl.Antartika, Antartika, Kec. Antartika Tengah, Kota Dingin, Kutub Utara',
            'nama_toko'=> 'Toko Antartika',
            'diskon_member'=> '5',
        ]);
    }
}
