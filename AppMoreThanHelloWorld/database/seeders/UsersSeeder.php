<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $users = [
            array(
                'admin', 'admin@admin.ch', '123', '1'
            ),
            array(
                'user', 'user@user.ch', '123', '0'
            ),
        ];

        DB::table('users')->delete();
        foreach ($users as $user) {
            DB::table('users')->insert([
                'name' => $user[0],
                'email' => $user[1],
                'password' => Hash::make($user[2]),
                'isAdmin' => $user[3]
            ]);
        }
    }
}
