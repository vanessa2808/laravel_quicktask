<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

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
                'user_id' => '1',
                'name' => 'Fix bug',
                'description' => 'Fix bug #557',
                'created_at' => Carbon::now(),

            ],
            [
                'user_id' => '2',
                'name' => 'Fix bug',
                'description' => 'Fix bug #555',
                'created_at' => Carbon::now(),

            ],
            [
                'user_id' => '3',
                'name' => 'Review Code',
                'description' => 'Review Code',
                'created_at' => Carbon::now(),

            ],

        ]);
    }
}
