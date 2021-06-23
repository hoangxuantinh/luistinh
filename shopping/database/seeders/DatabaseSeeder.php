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
        DB::table('permissions')->insert([
            ['name' => 'Danh mục','display_name' => 'Danh mục','parent_id' => 0 ],
            ['name' => 'Danh sách danh mục','display_name' => 'Danh sách danh mục','parent_id' => 1 ],
            ['name' => 'Thêm danh mục','display_name' => 'Thêm danh mục','parent_id' => 1 ],
            ['name' => 'Sửa Danh mục','display_name' => 'Sửa Danh mục','parent_id' => 1 ],
            ['name' => 'Xóa danh mục','display_name' => 'Danh mục','parent_id' => 1 ],
            ['name' => 'Sản phẩm','display_name' => 'Sản phẩm','parent_id' => 0 ],
            ['name' => 'Danh sách sản phẩm','display_name' => 'Thêm sản phẩm','parent_id' => 6 ],
            ['name' => 'Thêm sản phẩm','display_name' => 'Thêm Sản phẩm','parent_id' => 6 ],
            ['name' => 'Sửa sản phẩm','display_name' => 'Sửa sản phẩm','parent_id' => 6 ],
            ['name' => 'Xóa sản phẩm','display_name' => 'Xóa sản phẩm','parent_id' => 6 ],
            ['name' => 'Setting','display_name' => 'Setting','parent_id' => 0 ],
            ['name' => 'Danh sách Setting','display_name' => 'Danh sách Setting','parent_id' => 11 ],
            ['name' => 'Thêm Setting','display_name' => 'Thêm Setting','parent_id' => 11],
            ['name' => 'Sửa Setting','display_name' => 'Sửa Setting','parent_id' => 11],
            ['name' => 'Xóa Setting','display_name' => 'Xóa Setting','parent_id' => 11],
            
            
        ]);
        
    }
}
