<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            ['name' => 'Danh mục sản phẩm', 'display_name' => 'Danh mục sản phẩm', 'parent_id' => '0',],
            ['name' => 'Danh sách danh mục', 'display_name' => 'Danh sách danh mục', 'parent_id' => '1',],
            ['name' => 'Thêm danh mục', 'display_name' => 'Thêm danh mục', 'parent_id' => '1',],
            ['name' => 'Sửa danh mục', 'display_name' => 'Sửa danh mục', 'parent_id' => '1',],
            ['name' => 'Xóa danh mục', 'display_name' => 'Xóa danh mục', 'parent_id' => '1',],
            ['name' => 'Menu', 'display_name' => 'Menu', 'parent_id' => '0',],
            ['name' => 'Danh sách Menu', 'display_name' => 'Danh sách Menu', 'parent_id' => '6',],
            ['name' => 'Thêm Menu', 'display_name' => 'Thêm Menu', 'parent_id' => '6',],
            ['name' => 'Sửa Menu', 'display_name' => 'Sửa Menu', 'parent_id' => '6',],
            ['name' => 'Xóa Menu', 'display_name' => 'Xóa Menu', 'parent_id' => '6',],
            ['name' => 'Slider', 'display_name' => 'Slider', 'parent_id' => '0',],
            ['name' => 'Danh sách Slider', 'display_name' => 'Danh sách Slider', 'parent_id' => '11',],
            ['name' => 'Thêm Slider', 'display_name' => 'Thêm Slider', 'parent_id' => '11',],
            ['name' => 'Sửa Slider', 'display_name' => 'Sửa Slider', 'parent_id' => '11',],
            ['name' => 'Xóa Slider', 'display_name' => 'Xóa Slider', 'parent_id' => '11',],
            ['name' => 'Sản phẩm', 'display_name' => 'Sản phẩm', 'parent_id' => '0',],
            ['name' => 'Danh sách sản phẩm', 'display_name' => 'Danh sách sản phẩm', 'parent_id' => '16',],
            ['name' => 'Thêm sản phẩm', 'display_name' => 'Thêm sản phẩm', 'parent_id' => '16',],
            ['name' => 'Sửa sản phẩm', 'display_name' => 'Sửa sản phẩm', 'parent_id' => '16',],
            ['name' => 'Xóa sản phẩm', 'display_name' => 'Xóa sản phẩm', 'parent_id' => '16',],
            ['name' => 'Setting', 'display_name' => 'Setting', 'parent_id' => '0',],
            ['name' => 'Danh sách Setting', 'display_name' => 'Danh sách Setting', 'parent_id' => '21',],
            ['name' => 'Thêm Setting', 'display_name' => 'Thêm Setting', 'parent_id' => '21',],
            ['name' => 'Sửa Setting', 'display_name' => 'Sửa Setting', 'parent_id' => '21',],
            ['name' => 'Xóa Setting', 'display_name' => 'Xóa Setting', 'parent_id' => '21',],
            ['name' => 'Người dùng', 'display_name' => 'Người dùng', 'parent_id' => '0',],
            ['name' => 'Danh sách người dùng', 'display_name' => 'Danh sách người dùng', 'parent_id' => '26',],
            ['name' => 'Thêm người dùng', 'display_name' => 'Thêm người dùng', 'parent_id' => '26',],
            ['name' => 'Sửa người dùng', 'display_name' => 'Sửa người dùng', 'parent_id' => '26',],
            ['name' => 'Xóa người dùng', 'display_name' => 'Xóa người dùng', 'parent_id' => '26',],
            ['name' => 'Vai trò', 'display_name' => 'Vai trò', 'parent_id' => '0',],
            ['name' => 'Danh sách vai trò', 'display_name' => 'Danh sách vai trò', 'parent_id' => '31',],
            ['name' => 'Thêm vai trò', 'display_name' => 'Thêm vai trò', 'parent_id' => '31',],
            ['name' => 'Sửa vai trò', 'display_name' => 'Sửa vai trò', 'parent_id' => '31',],
            ['name' => 'Xóa vai trò', 'display_name' => 'Xóa vai trò', 'parent_id' => '31',],
        ]);
    }
}
