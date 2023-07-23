<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('role_users')->insert([
            [
                'id' => 1,
                'name_role' => 'Admin'
            ],
            [
                'id' => 2,
                'name_role' => 'Customer'
            ]
        ]);
        
        
        DB::table('users')->insert([
            'id' => 1,
            'role_user' => 1,
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'no_telp' => '08212232922',
            'password' => bcrypt('admin123'),
            'created_at' => Carbon::now(),
        ]);

        DB::table('settings')->insert([
            'id' => 1,
            'link_maps' => "https://goo.gl/maps/CbHgsJbq46NvUSFw8",
            'no_telp' => '0888888822',
            'link_instagram' => "https://goo.gl/maps/CbHgsJbq46NvUSFw8",
            'created_at' => Carbon::now(),
        ]);
    }
}
