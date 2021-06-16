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
        $url = "https://pingouin.heig-vd.ch/mthw/storage/imgquizz/";
        $url2 = "http://127.0.0.1:8000/storage/imgquizz/";
        $images = ["{$url2}escalade.jpg", 'url2', 'url3'];
        
        // DB::table('images')->delete();
        for ($i = 0; $i < 100; $i++) {
            DB::table('images')->insert([
                'url' => $i
            ]);
        }
    }
}