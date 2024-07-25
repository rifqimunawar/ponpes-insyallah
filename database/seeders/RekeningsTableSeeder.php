<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RekeningsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('rekenings')->delete();
        
        \DB::table('rekenings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'BCA',
                'saldo' => '0',
                'created_at' => '2024-07-21 06:50:03',
                'updated_at' => '2024-07-21 06:50:03',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Mandiri',
                'saldo' => '0',
                'created_at' => '2024-07-21 06:51:40',
                'updated_at' => '2024-07-21 06:51:40',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'BRI',
                'saldo' => '24075000',
                'created_at' => '2024-07-21 06:51:47',
                'updated_at' => '2024-07-23 08:43:21',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Dana',
                'saldo' => '0',
                'created_at' => '2024-07-21 06:51:52',
                'updated_at' => '2024-07-21 06:51:52',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Cash',
                'saldo' => '-20000',
                'created_at' => '2024-07-21 06:51:59',
                'updated_at' => '2024-07-23 08:28:51',
            ),
        ));
        
        
    }
}