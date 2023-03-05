<?php

namespace Database\Seeders;

use App\Models\Stats;
use Illuminate\Database\Seeder;

class StatsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $devices=['feeder','water','temperature','light'];
        foreach($devices as $device)
        {
            Stats::create(['device'=>$device]);
        }
    }
}
