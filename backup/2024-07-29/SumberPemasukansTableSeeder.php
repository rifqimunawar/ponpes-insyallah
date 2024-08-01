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
                'created_at' => '2024-07-23 08:22:49',
                'updated_at' => '2024-07-23 08:22:49',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Joki Skripsi',
                'created_at' => '2024-07-23 08:23:01',
                'updated_at' => '2024-07-23 08:23:09',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Hibah',
                'created_at' => '2024-07-25 15:24:34',
                'updated_at' => '2024-07-25 15:24:34',
            ),
        ));
        
        
    }
}