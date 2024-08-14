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
                'tanggal' => '2024-08-01',
                'saldo' => 15000,
                'rekening_id' => 5,
                'transaksi_id' => 1,
                'kegiatan_id' => 1,
                'kebutuhan_id' => 2,
                'user_id' => 1,
                'created_at' => '2024-08-02 08:31:53',
                'updated_at' => '2024-08-02 08:31:53',
            ),
            1 => 
            array (
                'id' => 2,
                'tanggal' => '2024-08-01',
                'saldo' => 50000,
                'rekening_id' => 5,
                'transaksi_id' => 1,
                'kegiatan_id' => 1,
                'kebutuhan_id' => 9,
                'user_id' => 1,
                'created_at' => '2024-08-02 08:33:13',
                'updated_at' => '2024-08-02 08:33:13',
            ),
            2 => 
            array (
                'id' => 3,
                'tanggal' => '2024-08-01',
                'saldo' => 40000,
                'rekening_id' => 5,
                'transaksi_id' => 1,
                'kegiatan_id' => 1,
                'kebutuhan_id' => 1,
                'user_id' => 1,
                'created_at' => '2024-08-02 08:33:36',
                'updated_at' => '2024-08-02 08:33:36',
            ),
            3 => 
            array (
                'id' => 5,
                'tanggal' => '2024-08-02',
                'saldo' => 25000,
                'rekening_id' => 5,
                'transaksi_id' => 1,
                'kegiatan_id' => 5,
                'kebutuhan_id' => 3,
                'user_id' => 1,
                'created_at' => '2024-08-02 17:24:54',
                'updated_at' => '2024-08-02 17:24:54',
            ),
            4 => 
            array (
                'id' => 6,
                'tanggal' => '2024-08-02',
                'saldo' => 30000,
                'rekening_id' => 5,
                'transaksi_id' => 1,
                'kegiatan_id' => 5,
                'kebutuhan_id' => 1,
                'user_id' => 1,
                'created_at' => '2024-08-02 21:16:09',
                'updated_at' => '2024-08-02 21:16:09',
            ),
            5 => 
            array (
                'id' => 7,
                'tanggal' => '2024-08-07',
                'saldo' => 10000,
                'rekening_id' => 5,
                'transaksi_id' => 1,
                'kegiatan_id' => 1,
                'kebutuhan_id' => 8,
                'user_id' => 1,
                'created_at' => '2024-08-07 16:04:16',
                'updated_at' => '2024-08-07 16:04:16',
            ),
            6 => 
            array (
                'id' => 8,
                'tanggal' => '2024-08-08',
                'saldo' => 20000,
                'rekening_id' => 5,
                'transaksi_id' => 1,
                'kegiatan_id' => 1,
                'kebutuhan_id' => 1,
                'user_id' => 1,
                'created_at' => '2024-08-08 13:07:22',
                'updated_at' => '2024-08-08 13:07:22',
            ),
            7 => 
            array (
                'id' => 9,
                'tanggal' => '2024-08-14',
                'saldo' => 15000,
                'rekening_id' => 5,
                'transaksi_id' => 1,
                'kegiatan_id' => 1,
                'kebutuhan_id' => 2,
                'user_id' => 1,
                'created_at' => '2024-08-14 14:04:59',
                'updated_at' => '2024-08-14 14:04:59',
            ),
        ));
        
        
    }
}