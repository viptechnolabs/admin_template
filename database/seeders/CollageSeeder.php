<?php

namespace Database\Seeders;

use App\Models\Collage;
use Illuminate\Database\Seeder;

class CollageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i = 1; $i < 20; $i++) {
            Collage::insert([
                'name' => 'MKBU',
                'user_id' => 1,
                'university_id' => 1,
                'code' => $i,
                'contact' => '1234sds56' . $i,
                'address' => 'Bhavnagar',
            ]);
        }
    }
}
