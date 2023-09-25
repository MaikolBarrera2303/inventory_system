<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Maikol Barrera',
            'email' => 'maicol@test.com',
            'document' => '2303',
            'role_id' => 1,
            'password' => Hash::make(2303),
        ]);
    }
}
