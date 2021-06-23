<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['name' => 'admin','display_name' => 'quản trị hệ thống'],
            ['name' => 'developer','display_name' => 'phát triển hệ thống'],
            ['name' => 'guest','display_name' => 'Khách hàng'],
            ['name' => 'editpr','display_name' => 'Nhập Văn Bản'],
        ]);
    }
}
