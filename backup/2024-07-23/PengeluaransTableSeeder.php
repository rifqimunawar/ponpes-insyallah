<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PengeluaransTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pengeluarans')->delete();
        
        \DB::table('pengeluarans')->insert(array (
            0 => 
            array (
                'id' => 1,
                'tanggal' => '07/21/2024',
                'saldo' => 60000,
                'rekening_id' => 3,
                'transaksi_id' => 1,
                'kegiatan_id' => 1,
                'kebutuhan_id' => 2,
                'created_at' => '2024-07-21 09:49:35',
                'updated_at' => '2024-07-21 09:49:35',
            ),
        ));
        
        
    }
}