<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KegiatansTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('kegiatans')->delete();
        
        \DB::table('kegiatans')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 1,
                'name' => 'kerja',
                'created_at' => '2024-07-21 07:33:26',
                'updated_at' => '2024-07-23 08:18:57',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 1,
                'name' => 'liburan',
                'created_at' => '2024-07-21 07:33:35',
                'updated_at' => '2024-07-21 07:33:35',
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 1,
                'name' => 'bulanan',
                'created_at' => '2024-07-21 07:33:44',
                'updated_at' => '2024-07-21 07:33:44',
            ),
            3 => 
            array (
                'id' => 5,
                'user_id' => 1,
                'name' => 'mudik',
                'created_at' => '2024-08-02 17:24:14',
                'updated_at' => '2024-08-02 17:24:14',
            ),
        ));
        
        
    }
}