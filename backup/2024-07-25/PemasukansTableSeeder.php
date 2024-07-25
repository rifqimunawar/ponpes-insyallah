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
                'id' => 2,
                'tanggal' => '07/23/2024',
                'saldo' => 100000,
                'rekening_id' => 5,
                'transaksi_id' => 2,
                'sumber_pemasukan_id' => 2,
                'created_at' => '2024-07-23 08:55:52',
                'updated_at' => '2024-07-23 08:55:52',
            ),
            1 => 
            array (
                'id' => 3,
                'tanggal' => '07/23/2024',
                'saldo' => 500000,
                'rekening_id' => 3,
                'transaksi_id' => 2,
                'sumber_pemasukan_id' => 1,
                'created_at' => '2024-07-23 09:01:38',
                'updated_at' => '2024-07-23 09:03:48',
            ),
        ));
        
        
    }
}