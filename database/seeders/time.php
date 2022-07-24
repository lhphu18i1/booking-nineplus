<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class time extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('times')->insert([
            ['id' => 1, 'time' => '09:00'],
            ['id' => 2, 'time' => '09:30'],
            ['id' => 3, 'time' => '10:00'],
            ['id' => 4, 'time' => '10:30'],
            ['id' => 5, 'time' => '11:00'],
            ['id' => 6, 'time' => '11:30'],
            ['id' => 7, 'time' => '12:00'],
            ['id' => 8, 'time' => '13:00'],
            ['id' => 9, 'time' => '13:30'],
            ['id' => 10, 'time' => '14:00'],
            ['id' => 11, 'time' => '14:30'],
            ['id' => 12, 'time' => '15:00'],
            ['id' => 13, 'time' => '15:30'],
            ['id' => 14, 'time' => '16:00'],
            ['id' => 15, 'time' => '16:30'],
            ['id' => 16, 'time' => '17:00']
        ]);
    }
}
