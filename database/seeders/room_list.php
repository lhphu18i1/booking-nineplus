<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class room_list extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('room_lists')->insert([
            ['id' => 1, 'name' => 'Phòng số 1'],
            ['id' => 2, 'name' => 'Phòng số 2'],
            ['id' => 3, 'name' => 'Phòng số 3'],
            ['id' => 4, 'name' => 'Phòng số 4'],
        ]);
    }
}
