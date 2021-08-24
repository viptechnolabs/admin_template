<?php

namespace Database\Seeders;

use App\Models\university;
use Illuminate\Database\Seeder;

class UniversitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i = 100; $i < 120; $i++) {
            university::insert([
                'name' => $faker->name(),
                'code' => $i,
                'contact' => '1234567' . $i,
                'address' => 'Bhavnagar',
                'user_id' => 2
            ]);

        }
    }
}
