<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KebutuhansTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('kebutuhans')->delete();
        
        \DB::table('kebutuhans')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'kopi/rokok',
                'created_at' => '2024-07-21 09:31:59',
                'updated_at' => '2024-07-21 09:31:59',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'makan/minum',
                'created_at' => '2024-07-21 09:32:08',
                'updated_at' => '2024-07-21 09:32:08',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'bensin/transportasi',
                'created_at' => '2024-07-21 09:32:20',
                'updated_at' => '2024-07-21 09:32:20',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'nongkrong/jajan',
                'created_at' => '2024-07-21 09:32:34',
                'updated_at' => '2024-07-21 09:32:34',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'cukur rambut',
                'created_at' => '2024-07-21 09:35:38',
                'updated_at' => '2024-07-21 09:35:38',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'loundry',
                'created_at' => '2024-07-21 09:35:54',
                'updated_at' => '2024-07-21 09:35:54',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'pusla/kuota',
                'created_at' => '2024-07-21 09:36:11',
                'updated_at' => '2024-07-21 09:36:11',
            ),
        ));
        
        
    }
}