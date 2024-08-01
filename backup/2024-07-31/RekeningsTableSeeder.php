<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RekeningsTableSeeder extends Seeder
{

  /**
   * Auto generated seed file
   *
   * @return void
   */
  public function run()
  {


    \DB::table('rekenings')->delete();

    \DB::table('rekenings')->insert(
      array(
        0 =>
          array(
            'id' => 1,
            'name' => 'BCA',
            'user_id' => 1,
            'saldo' => '0',
            'created_at' => '2024-07-21 06:50:03',
            'updated_at' => '2024-07-28 13:51:34',
          ),
        1 =>
          array(
            'id' => 2,
            'name' => 'Mandiri',
            'user_id' => 1,
            'saldo' => '0',
            'created_at' => '2024-07-21 06:51:40',
            'updated_at' => '2024-07-25 15:23:42',
          ),
        2 =>
          array(
            'id' => 3,
            'name' => 'BRI',
            'user_id' => 1,
            'saldo' => '0',
            'created_at' => '2024-07-21 06:51:47',
            'updated_at' => '2024-07-28 15:41:37',
          ),
        3 =>
          array(
            'id' => 5,
            'name' => 'Cash',
            'user_id' => 1,
            'saldo' => '10000',
            'created_at' => '2024-07-21 06:51:59',
            'updated_at' => '2024-07-28 17:12:07',
          ),
        4 =>
          array(
            'id' => 6,
            'name' => 'Dana',
            'user_id' => 1,
            'saldo' => '0',
            'created_at' => '2024-07-28 15:42:32',
            'updated_at' => '2024-07-28 17:07:24',
          ),
      )
    );


  }
}