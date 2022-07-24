<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class position extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('positions')->insert([
            ['id' => 1, 'name' => 'Giám đốc'],
            ['id' => 2, 'name' => 'Trưởng phòng'],
            ['id' => 3, 'name' => 'Nhân viên'],
            ['id' => 4, 'name' => 'Thư ký'],
        ]);
    }
}
