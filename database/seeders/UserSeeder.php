<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Generate Users.
     *
     * @return void
     */
    public function run()
    {

        $users = [
            [
                'agency_id' => '1',
                'name' => 'Admin',
                'last_name' => 'Super Admin 1',
                'email' => 'admin@gmail.com',
                'mobile_number' => '09775556620',
                'profile' => 'profile.jpg',
                'role' => 'SUPER_ADMIN',
                'password'       => '$2y$10$zPiaTbYwkxYcejFmEimhWedeAogTJvEb/yGmBVx390ihhPFy8r896' ,//password
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
              'agency_id' => '1',
              'name' => 'Admin 2',
              'last_name' => 'Super Admin 2',
              'email' => 'admin1@gmail.com',
              'mobile_number' => '09775556620',
              'profile' => 'profile.jpg',
              'role' => 'SUPER_ADMIN',
              'password'       => '$2y$10$zPiaTbYwkxYcejFmEimhWedeAogTJvEb/yGmBVx390ihhPFy8r896' ,//password
              'created_at' => date("Y-m-d H:i:s"),
              'updated_at' => date("Y-m-d H:i:s"),
          ],
            [
              'agency_id' => '2',
              'name' => 'Admin',
              'last_name' => 'Admin',
              'email' => 'admin2@gmail.com',
              'mobile_number' => '09775556621',
              'profile' => 'profile.jpg',
              'role' => 'ADMIN',
              'password'       => '$2y$10$zPiaTbYwkxYcejFmEimhWedeAogTJvEb/yGmBVx390ihhPFy8r896' ,//password
              'created_at' => date("Y-m-d H:i:s"),
              'updated_at' => date("Y-m-d H:i:s"),
          ],

        ];

        User::insert($users);
    }
}
