<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PemasukansTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pemasukans')->delete();
        
        \DB::table('pemasukans')->insert(array (
            0 => 
            array (
                'id' => 8,
                'tanggal' => '2024-07-28',
                'saldo' => 10000,
                'rekening_id' => 5,
                'transaksi_id' => 2,
                'sumber_pemasukan_id' => 3,
                'user_id' => 1,
                'created_at' => '2024-07-28 17:12:07',
                'updated_at' => '2024-07-28 17:12:07',
            ),
        ));
        
        
    }
}