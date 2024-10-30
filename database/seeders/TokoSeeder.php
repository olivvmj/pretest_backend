<?php

namespace Database\Seeders;

use App\Models\Toko;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TokoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();

        if ($user) {
            Toko::create([
                'user_id' => $user->id,
                'nama' => 'Toko Pertama',
                'alamat' => 'Jl. Mawar No. 123',
            ]);

            Toko::create([
                'user_id' => $user->id,
                'nama' => 'Toko Kedua',
                'alamat' => 'Jl. Melati No. 456',
            ]);
        }
    }
}
