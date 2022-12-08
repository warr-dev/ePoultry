<?php

namespace Database\Seeders;

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
        User::create([
            'name'=>'administrator',
            'email'=>'admin@example.com',
            'password'=> Hash::make('admin')
        ]);
        WaterConf::create([
            'mode'=>'setup',
            'maintankheight'=>0,
            'dispensertankheight'=>0,
        ]);
    }
}
