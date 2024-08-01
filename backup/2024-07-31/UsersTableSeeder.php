<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'rifqi',
                'email' => 'rifqi@gmail.com',
                'password' => '$2y$12$oZg6/3fQb8ct/EAoTnPsgO4mlF.RUpwFAMBuFOWqICHN3Sn4HeNNi',
                'role_id' => 2,
                'remember_token' => NULL,
                'created_at' => '2024-07-31 21:11:15',
                'updated_at' => '2024-07-31 21:11:15',
            ),
        ));
        
        
    }
}