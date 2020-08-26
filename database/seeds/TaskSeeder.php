<?php

use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert([
            [
                'user_id'=> '1',
                'name' => 'Fix bug',
                'description' => 'Fix bug #557',
                'email_verified_at' => Carbon::now(),
                'created_at' => Carbon::now(),

            ],
            [
                'user_id'=> '2',
                'name' => 'Fix bug',
                'description' => 'Fix bug #555',
                'email_verified_at' => Carbon::now(),
                'created_at' => Carbon::now(),

            ],
            [
                'user_id'=> '3',
                'name' => 'Review Code',
                'description' => 'Review Code',
                'email_verified_at' => Carbon::now(),
                'created_at' => Carbon::now(),

            ],

        ]);
    }
}
