<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class user extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['id' => 1, 'name' => 'Nguyễn Văn An', 'email' => 'an@gmail.com', 'password' => bcrypt('12345678'), 'gender' => 'male', 'phone'=>'0388123456', 'position' => 'Trưởng phòng', 'department' => 'Kỹ thuật'],
            ['id' => 2, 'name' => 'Nguyễn Thị Nga', 'email' => 'nga@gmail.com', 'password' => bcrypt('12345678'), 'gender' => 'female', 'phone'=>'0388456789', 'position'=>'Nhân viên', 'department'=>'Kế toán'],
            ['id' => 3, 'name' => 'Nguyễn Thị Hoa', 'email' => 'hoa@gmail.com', 'password' => bcrypt('12345678'), 'gender' => 'female', 'phone'=>'0388987456', 'position'=>'Trưởng phòng', 'department'=>'Nhân sự'],
        ]);
    }
}
