<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'email' => 'admin@gmail.com',
            'type' => 1,
            'password' => Hash::make('password')
        ]);
        $name = [1 => 'admin2@gmail.com', 2 => 'admin3@gmail.com', 3 => 'admin4@gmail.com', 4 => 'admin5@gmail.com', 5 => 'admin6@gmail.com',];

        for ($i = 1; $i < 5; $i++) {
            User::insert([
                'email' => $name[$i],
                'password' => Hash::make('password')
            ]);
        }
    }
}
