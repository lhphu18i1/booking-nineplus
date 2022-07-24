<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class department extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            ['id' => 1, 'name' => 'Kỹ thuật'],
            ['id' => 2, 'name' => 'Nhân sự'],
            ['id' => 3, 'name' => 'Kế toán'],
            ['id' => 4, 'name' => 'Kinh doanh'],
        ]);
    }
}
