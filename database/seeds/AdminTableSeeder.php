<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin')->insert([
            'name' => 'Admin',
            'email' => 'su@admin.com',
            'password' => bcrypt('super-admin')
        ]);
    }
}
