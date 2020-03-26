<?php

use Illuminate\Database\Seeder;

class OtherRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('otherrole')->insert([
            'name' => 'Other Role',
            'email' => 'role@role.com',
            'password' => bcrypt('super-role')
        ]);
    }
}
