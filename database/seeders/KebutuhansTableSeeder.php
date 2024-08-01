<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KebutuhansTableSeeder extends Seeder
{

  /**
   * Auto generated seed file
   *
   * @return void
   */
  public function run()
  {


    \DB::table('kebutuhans')->delete();

    \DB::table('kebutuhans')->insert(
      array(
        0 =>
          array(
            'id' => 1,
            'user_id' => 1,
            'name' => 'kopi/rokok',
            'created_at' => '2024-07-21 09:31:59',
            'updated_at' => '2024-07-21 09:31:59',
          ),
        1 =>
          array(
            'id' => 2,
            'user_id' => 1,
            'name' => 'makan/minum',
            'created_at' => '2024-07-21 09:32:08',
            'updated_at' => '2024-07-21 09:32:08',
          ),
        2 =>
          array(
            'id' => 3,
            'user_id' => 1,
            'name' => 'bensin/transportasi',
            'created_at' => '2024-07-21 09:32:20',
            'updated_at' => '2024-07-21 09:32:20',
          ),
        3 =>
          array(
            'id' => 5,
            'user_id' => 1,
            'name' => 'cukur rambut',
            'created_at' => '2024-07-21 09:35:38',
            'updated_at' => '2024-07-21 09:35:38',
          ),
        4 =>
          array(
            'id' => 6,
            'user_id' => 1,
            'name' => 'loundry',
            'created_at' => '2024-07-21 09:35:54',
            'updated_at' => '2024-07-21 09:35:54',
          ),
        5 =>
          array(
            'id' => 7,
            'user_id' => 1,
            'name' => 'pusla/kuota',
            'created_at' => '2024-07-21 09:36:11',
            'updated_at' => '2024-07-21 09:36:11',
          ),
        6 =>
          array(
            'id' => 8,
            'user_id' => 1,
            'name' => 'service motor',
            'created_at' => '2024-07-28 15:41:09',
            'updated_at' => '2024-07-28 15:41:09',
          ),
      )
    );


  }
}