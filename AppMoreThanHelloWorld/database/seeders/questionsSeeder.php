<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class questionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('questions')->delete();


        DB::table('questions')->insert([
            'enonce' => 'la question test']);

    }
}
