<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('roles')->insert([
            ['name' => 'admin','display_name' => 'Quản trị hệ thống'],
            ['name' => 'guest','display_name' => 'Khách Hnàng'],
            ['name' => 'Developer','display_name' => 'Phát triển hệ thống'],
            ['name' => 'Editor','display_name' => 'Nhập Văn Bản'],
        ]);
    }
}
