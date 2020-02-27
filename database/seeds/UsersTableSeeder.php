<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@larablog.com',
            'password' => Hash::make('admin1234'),
            'created_at' => date('Y-m-d h:i:s'),
            'email_verified_at' => date('Y-m-d h:i:s'),
            'level' => 'admin',
            'photo' => 'profile.jpg'
        ]);

        DB::table('users')->insert([
            'name' => 'User',
            'email' => 'user@larablog.com',
            'password' => Hash::make('user1234'),
            'created_at' => date('Y-m-d h:i:s'),
            'email_verified_at' => date('Y-m-d h:i:s'),
            'level' => 'user',
            'photo' => 'profile.jpg'
        ]);
    }
}
