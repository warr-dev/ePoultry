<?php

namespace Database\Seeders;

use App\Models\DHTConf;
use App\Models\FeedingConf;
use App\Models\LightConf;
use App\Models\SMSConf;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\WaterConf;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::truncate();
        WaterConf::truncate();
        DHTConf::truncate();
        LightConf::truncate();
        SMSConf::truncate();
        FeedingConf::truncate();
        User::create([
            'name'=>'administrator',
            'email'=>'sweetchild00008@gmail.com',
            'password'=> Hash::make('admin')
        ]);
        FeedingConf::create([
            'mode'=>'setup',
            'tankheight'=>20,
            'tankcritical'=>20,
        ]);
        WaterConf::create([
            'mode'=>'setup',
            'maintankheight'=>20,
            // 'dispensertankheight'=>20,
        ]);
        DHTConf::create(['interval' => 30,'critical_temperature'=>30,'critical_humidity'=>85]);
        LightConf::create(['value'=>30]);
        SMSConf::create(['apikey'=>config('app.semaphore')['apikey'],'number'=>'09561645935']);

    }
}
