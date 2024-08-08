<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PemindahanSaldosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pemindahan_saldos')->delete();
        
        \DB::table('pemindahan_saldos')->insert(array (
            0 => 
            array (
                'id' => 1,
                'tanggal' => '2024-07-25',
                'transaksi_id' => 3,
                'rekening_awal_id' => 3,
                'rekening_tujuan_id' => 5,
                'user_id' => 1,
                'saldo' => 100000,
                'created_at' => '2024-07-25 14:46:43',
                'updated_at' => '2024-07-25 14:46:43',
            ),
            1 => 
            array (
                'id' => 2,
                'tanggal' => '2024-07-25',
                'transaksi_id' => 3,
                'rekening_awal_id' => 3,
                'rekening_tujuan_id' => 2,
                'user_id' => 1,
                'saldo' => 5000000,
                'created_at' => '2024-07-25 15:23:42',
                'updated_at' => '2024-07-25 15:23:42',
            ),
            2 => 
            array (
                'id' => 3,
                'tanggal' => '2024-07-25',
                'transaksi_id' => 3,
                'rekening_awal_id' => 1,
                'rekening_tujuan_id' => 5,
                'user_id' => 1,
                'saldo' => 100000,
                'created_at' => '2024-07-25 15:26:03',
                'updated_at' => '2024-07-25 15:26:03',
            ),
            3 => 
            array (
                'id' => 4,
                'tanggal' => '2024-07-25',
                'transaksi_id' => 3,
                'rekening_awal_id' => 3,
                'rekening_tujuan_id' => 5,
                'user_id' => 1,
                'saldo' => 50000,
                'created_at' => '2024-07-28 15:39:08',
                'updated_at' => '2024-07-28 15:39:08',
            ),
        ));
        
        
    }
}