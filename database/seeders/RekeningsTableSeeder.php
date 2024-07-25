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
                'saldo' => '21',
                'created_at' => '2024-07-21 06:51:40',
                'updated_at' => '2024-07-23 08:50:20',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'BRI',
                'saldo' => '30765000',
                'created_at' => '2024-07-21 06:51:47',
                'updated_at' => '2024-07-25 14:32:34',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Dana',
                'saldo' => '21',
                'created_at' => '2024-07-21 06:51:52',
                'updated_at' => '2024-07-23 08:51:20',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Cash',
                'saldo' => '80000',
                'created_at' => '2024-07-21 06:51:59',
                'updated_at' => '2024-07-23 08:55:52',
            ),
        ));
        
        
    }
}