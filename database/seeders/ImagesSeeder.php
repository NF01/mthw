<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $images = ['url1', 'url2', 'url3'];

        // DB::table('images')->delete();
        for ($i = 0; $i < 100; $i++) {
            DB::table('images')->insert([
                'url' => $i
            ]);
        }
    }
}