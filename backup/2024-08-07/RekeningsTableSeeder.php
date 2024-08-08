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
                'user_id' => 1,
                'created_at' => '2024-07-21 06:50:03',
                'updated_at' => '2024-07-28 13:51:34',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Mandiri',
                'saldo' => '0',
                'user_id' => 1,
                'created_at' => '2024-07-21 06:51:40',
                'updated_at' => '2024-07-25 15:23:42',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'BRI',
                'saldo' => '2100000',
                'user_id' => 1,
                'created_at' => '2024-07-21 06:51:47',
                'updated_at' => '2024-08-02 08:29:16',
            ),
            3 => 
            array (
                'id' => 5,
                'name' => 'Cash',
                'saldo' => '40000',
                'user_id' => 1,
                'created_at' => '2024-07-21 06:51:59',
                'updated_at' => '2024-08-07 16:04:16',
            ),
            4 => 
            array (
                'id' => 6,
                'name' => 'Dana',
                'saldo' => '0',
                'user_id' => 1,
                'created_at' => '2024-07-28 15:42:32',
                'updated_at' => '2024-07-28 17:07:24',
            ),
            5 => 
            array (
                'id' => 9,
                'name' => 'BCA',
                'saldo' => '0',
                'user_id' => 3,
                'created_at' => '2024-08-05 23:07:05',
                'updated_at' => '2024-08-05 23:07:05',
            ),
        ));
        
        
    }
}