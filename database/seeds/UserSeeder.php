<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Vanessa',
                'email' => 'vanessa@gmail.com',
                'password' => bcrypt('12341234'),
                'email_verified_at' => Carbon::now(),
                'created_at' => Carbon::now(),

            ],
            [
                'name' => 'Lucy',
                'email' => 'Lucy@gmail.com',
                'password' => bcrypt('12341234'),
                'email_verified_at' => Carbon::now(),
                'created_at' => Carbon::now(),

            ],
            [
                'name' => 'Iris',
                'email' => 'Iris@gmail.com',
                'password' => bcrypt('12341234'),
                'email_verified_at' => Carbon::now(),
                'created_at' => Carbon::now(),
            ],

        ]);
    }
}
