<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HDT;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // HDT::truncate();
        for($i=1;$i<=10;$i++){
            HDT::create([
                'humidity'=>rand(30,40),
                'temperature'=>rand(25,35),
                'created_at'=>strtotime(date('Y-m-d H:i:s').' +'.$i.'hours')
            ]);
        }
    }
}
