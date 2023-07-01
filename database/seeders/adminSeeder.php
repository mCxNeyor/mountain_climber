<?php

namespace Database\Seeders;

use App\Models\Imei;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => "admin",
            'email'=>'admin@mountain.com',
            'password'=>Hash::make('Mountain23'),
        ]);
        Imei::create([
            'name'=>"dev1873",
            'status'=>0
        ]);
    }
}
