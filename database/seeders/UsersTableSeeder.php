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
                'name' => 'Rifqi Munawar',
                'avatar' => 'avatar_rifqi-1723619137.jpg',
                'email' => 'rifqi@gmail.com',
                'password' => '$2y$12$oZg6/3fQb8ct/EAoTnPsgO4mlF.RUpwFAMBuFOWqICHN3Sn4HeNNi',
                'role_id' => 2,
                'remember_token' => NULL,
                'created_at' => '2024-07-31 21:11:15',
                'updated_at' => '2024-08-14 14:05:37',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'prabowo',
                'avatar' => 'user.jpg',
                'email' => 'prabowo@gmail.com',
                'password' => '$2y$12$.vA5KAZDtwQoPhB.sj5CV.OgX97PMeuQwV2BiGVMzDxWSrlPOOihS',
                'role_id' => 2,
                'remember_token' => NULL,
                'created_at' => '2024-08-01 09:56:56',
                'updated_at' => '2024-08-01 09:56:56',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'NISA AZKA FAUZIAH',
                'avatar' => 'user.jpg',
                'email' => 'nisaazka890@gmail.com',
                'password' => '$2y$12$w0WjsWNB.Us1Wqn0PTikwe34XXeYB92s3mO2OvslJWjI2PIDZ6ojy',
                'role_id' => 2,
                'remember_token' => NULL,
                'created_at' => '2024-08-02 09:24:23',
                'updated_at' => '2024-08-02 09:24:23',
            ),
        ));
        
        
    }
}