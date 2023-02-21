<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('genres')->insert(['genre_name' => 'Rawstyle']);
        \DB::table('genres')->insert(['genre_name' => 'Uptempo']);
        \DB::table('genres')->insert(['genre_name' => 'Klaplongen']);
        \DB::table('genres')->insert(['genre_name' => 'Euphoric Hardstyle']);
        \DB::table('genres')->insert(['genre_name' => 'Meme Techno']);
    }
}
