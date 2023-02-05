<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement("DELETE FROM permissions");

        DB::table('permissions')->insert([
            [
                'id' => 1,
                'key' => 'user_module',
                'display_name' => 'User Module',
                'module_id' => 1,
            ],
            [
                'id' => 2,
                'key' => 'all_user',
                'display_name' => 'All User',
                'module_id' => 1,
            ],
            [
                'id' => 3,
                'key' => 'add_user',
                'display_name' => '-- Add User',
                'module_id' => 1,
            ],
            [
                'id' => 4,
                'key' => 'edit_user',
                'display_name' => '-- Edit User',
                'module_id' => 1,
            ],
            [
                'id' => 5,
                'key' => 'reset_password',
                'display_name' => '-- Reset Password',
                'module_id' => 1,
            ],
            [
                'id' => 6,
                'key' => 'settings',
                'display_name' => 'Setting Module',
                'module_id' => 50,
            ],
            [
                'id' => 7,
                'key' => 'app_info',
                'display_name' => '-- App Info',
                'module_id' => 50,
            ],
            [
                'id' => 8,
                'key' => 'location_module',
                'display_name' => 'Location Module',
                'module_id' => 2,
            ],
            [
                'id' => 9,
                'key' => 'all_location',
                'display_name' => '-- All Location',
                'module_id' => 2,
            ],
            [
                'id' => 10,
                'key' => 'add_location',
                'display_name' => '-- Add Location',
                'module_id' => 2,
            ],
            [
                'id' => 11,
                'key' => 'edit_location',
                'display_name' => '-- Edit Location',
                'module_id' => 2,
            ],
            [
                'id' => 12,
                'key' => 'all_path',
                'display_name' => '-- All Path',
                'module_id' => 2,
            ],
            [
                'id' => 13,
                'key' => 'add_path',
                'display_name' => '-- Add Path',
                'module_id' => 2,
            ],
            [
                'id' => 14,
                'key' => 'edit_path',
                'display_name' => '-- Edit Path',
                'module_id' => 2,
            ],
        ]);
    }
}