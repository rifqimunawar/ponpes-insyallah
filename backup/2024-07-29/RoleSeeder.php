<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run() : void
  {

    \DB::table('roles')->delete();

    \DB::table('roles')->insert(
      array(
        0 =>
          array(
            'id' => 1,
            'name' => 'Administrator',
            'created_at' => '2024-07-23 08:22:49',
            'updated_at' => '2024-07-23 08:22:49',
          ),
        1 =>
          array(
            'id' => 2,
            'name' => 'User',
            'created_at' => '2024-07-23 08:23:01',
            'updated_at' => '2024-07-23 08:23:09',
          ),
      )
    );


  }
}
