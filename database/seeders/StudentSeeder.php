<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 20; $i++) {
            Student::insert([
                'user_id' => 3,
                'first_name' => 'First',
                'mid_name' => 'mid',
                'last_name' => 'last_name',
                'stream' => 'BCA',
                'date_of_birth' => now(),
                'gender' => 1,
                'phone' => '1234657' . $i,
                'address' => 'Bhavnagar',
            ]);
        }
    }
}
