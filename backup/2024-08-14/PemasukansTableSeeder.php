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
                'id' => 9,
                'tanggal' => '2024-08-01',
                'saldo' => 2300000,
                'rekening_id' => 3,
                'transaksi_id' => 2,
                'sumber_pemasukan_id' => 1,
                'user_id' => 1,
                'created_at' => '2024-08-02 08:28:40',
                'updated_at' => '2024-08-02 08:28:40',
            ),
        ));
        
        
    }
}