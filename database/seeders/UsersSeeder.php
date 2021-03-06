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
                'admin', 'admin@admin.ch', 'mthw123$', '0', 1
            ),
            // array(
            //     'user', 'user@user.ch', '123', '5700', 0
            // ),
            // array(
            //     'user1', 'user1@user.ch', '123', '3500', 0
            // ),
            // array(
            //     'user2', 'user2@user.ch', '123', '6700', 0
            // ),
            // array(
            //     'user3', 'user3@user.ch', '123', '8100', 0
            // ),
            // array(
            //     'user4', 'user4@user.ch', '123', '4000', 0
            // ),
            // array(
            //     'user5', 'user5@user.ch', '123', '7300', 0
            // ),
        ];

        DB::table('users')->delete();
        foreach ($users as $user) {
            DB::table('users')->insert([
                'name' => $user[0],
                'email' => $user[1],
                'password' => Hash::make($user[2]),
                'experience' => $user[3],
                'isAdmin' => $user[4],

            ]);
        }
    }
}