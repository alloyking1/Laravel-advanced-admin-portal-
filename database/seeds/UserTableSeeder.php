<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //run seeder for user table
        DB::table('users')->insert([
            'firstname' => str_random(10),
            'lastname' => str_random(10),
            'email' => str_random(10).'@email.com',
            'password' => bcrypt('password'),
            'address' => bcrypt('my house near heaven'),
            'gender' => bcrypt('male')
        ]);
    }
}
