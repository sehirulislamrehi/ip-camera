<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("DELETE FROM modules");
        DB::table('modules')->insert([
            [
                'id' => 1,
                'name' => 'User Module',
                'key' => 'user_module',
                'icon' => 'fas fa-users',
                'position' => 1,
                'route' => null
            ],
            [
                'id' => 2,
                'name' => 'Location Module',
                'key' => 'location_module',
                'icon' => 'fas fa-map',
                'position' => 2,
                'route' => null
            ],
            [
                'id' => 50,
                'name' => 'Setting Module',
                'key' => 'settings',
                'icon' => 'fas fa-cog',
                'position' => 50,
                'route' => null,
            ],
            
        ]);
    }
}