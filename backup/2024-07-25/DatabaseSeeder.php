<?php

use Illuminate\Database\Seeder;
use Database\Seeders\KegiatansTableSeeder;
use Database\Seeders\RekeningsTableSeeder;
use Database\Seeders\KebutuhansTableSeeder;
use Database\Seeders\PemasukansTableSeeder;
use Database\Seeders\TransaksisTableSeeder;
use Database\Seeders\PengeluaransTableSeeder;
use Database\Seeders\SumberPemasukansTableSeeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    // $this->call(UsersTableSeeder::class);
    $this->call(RekeningsTableSeeder::class);
    $this->call(TransaksisTableSeeder::class);
    $this->call(KegiatansTableSeeder::class);
    $this->call(KebutuhansTableSeeder::class);
    $this->call(PengeluaransTableSeeder::class);
    $this->call(PemasukansTableSeeder::class);
    $this->call(SumberPemasukansTableSeeder::class);
      $this->call(GaleriesTableSeeder::class);
    }
}