<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TransaksisTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('transaksis')->delete();
        
        \DB::table('transaksis')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Pengeluaran',
                'created_at' => '2024-07-21 06:50:22',
                'updated_at' => '2024-07-21 06:50:22',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Pemasukan',
                'created_at' => '2024-07-21 06:50:41',
                'updated_at' => '2024-07-21 06:50:41',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Pemindahan Saldo',
                'created_at' => '2024-07-21 06:50:55',
                'updated_at' => '2024-07-21 06:50:55',
            ),
        ));
        
        
    }
}