<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Administrator',
                'created_at' => '2024-07-23 08:22:49',
                'updated_at' => '2024-07-23 08:22:49',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'User',
                'created_at' => '2024-07-23 08:23:01',
                'updated_at' => '2024-07-23 08:23:09',
            ),
        ));
        
        
    }
}