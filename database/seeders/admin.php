<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            ['id' => 1, 'name' => 'Admin', 'email' => 'admin@gmail.com', 'password' => bcrypt('12345678')],
        ]);
    }
}
