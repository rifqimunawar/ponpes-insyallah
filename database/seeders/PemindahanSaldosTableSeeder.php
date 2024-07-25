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
        
        
        
    }
}