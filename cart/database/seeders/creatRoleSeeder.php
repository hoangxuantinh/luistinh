<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class creatRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'admin','display_name' => 'Quản trị hệ thống'],
            ['name' => 'guest','display_name' => 'Khách Hàng'],
            ['name' => 'Developer','display_name' => 'Phát Triển hệ thống'],
            ['name' => 'Content','display_name' => 'Chỉnh sửa content'],
            
        ];
        DB::table('roles')->insert($data);
    }
}
