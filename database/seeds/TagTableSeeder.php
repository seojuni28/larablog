<?php

use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            'name' => 'fun',
            'slug' => 'fun',
            'created_at' => date('Y-m-d h:i:s')
        ]);

        DB::table('tags')->insert([
            'name' => 'unique',
            'slug' => 'unique',
            'created_at' => date('Y-m-d h:i:s')
        ]);

        DB::table('tags')->insert([
            'name' => 'new',
            'slug' => 'new',
            'created_at' => date('Y-m-d h:i:s')
        ]);
    }
}
