<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SumberPemasukansTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sumber_pemasukans')->delete();
        
        \DB::table('sumber_pemasukans')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Gaji',
                'user_id' => 1,
                'created_at' => '2024-07-23 08:22:49',
                'updated_at' => '2024-07-23 08:22:49',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Joki Skripsi',
                'user_id' => 1,
                'created_at' => '2024-07-23 08:23:01',
                'updated_at' => '2024-07-23 08:23:09',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Hibah',
                'user_id' => 1,
                'created_at' => '2024-07-25 15:24:34',
                'updated_at' => '2024-07-25 15:24:34',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'penjualan',
                'user_id' => 1,
                'created_at' => '2024-08-02 09:19:22',
                'updated_at' => '2024-08-02 09:19:22',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'uang bulanan',
                'user_id' => 3,
                'created_at' => '2024-08-02 09:34:36',
                'updated_at' => '2024-08-02 09:34:36',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'uang bulanan',
                'user_id' => 3,
                'created_at' => '2024-08-05 20:53:12',
                'updated_at' => '2024-08-05 20:53:12',
            ),
        ));
        
        
    }
}