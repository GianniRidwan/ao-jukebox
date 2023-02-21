<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('songs')->insert(['genre_id' => 1,'song_name' => 'The Keymaker','artist_name' => 'Rejecta','duration' => '00:03:07']);
        \DB::table('songs')->insert(['genre_id' => 1,'song_name' => 'Basstrain - Reblion remix','artist_name' => 'Rebelion & Sub Zero Project','duration' => '00:03:11']);
        \DB::table('songs')->insert(['genre_id' => 1,'song_name' => 'Homicide','artist_name' => 'Rejecta & Act of Rage','duration' => '00:03:41']);

        \DB::table('songs')->insert(['genre_id' => 2,'song_name' => 'El Fuego De La Catalunya - Brutal Theory remix','artist_name' => 'Brutal Theory','duration' => '00:02:00']);
        \DB::table('songs')->insert(['genre_id' => 2,'song_name' => 'Stop De Boot','artist_name' => 'Dimitri K','duration' => '00:01:46']);
        \DB::table('songs')->insert(['genre_id' => 2,'song_name' => 'BATTLEFIELD','artist_name' => 'LunaKorpz','duration' => '00:02:42']);

        \DB::table('songs')->insert(['genre_id' => 3,'song_name' => 'TOO COLD','artist_name' => 'Rooler & Sickmode','duration' => '00:03:06']);
        \DB::table('songs')->insert(['genre_id' => 3,'song_name' => 'DOWN DOWN','artist_name' => 'Rooler & Sickmode','duration' => '00:03:26']);
        \DB::table('songs')->insert(['genre_id' => 3,'song_name' => 'RAVE LOVE','artist_name' => 'Sickmode & Mish','duration' => '00:03:39']);

        \DB::table('songs')->insert(['genre_id' => 4,'song_name' => 'Sunlight','artist_name' => 'MVTATE & NOMI','duration' => '00:03:37']);
        \DB::table('songs')->insert(['genre_id' => 4,'song_name' => 'Imaginary','artist_name' => 'Brennen Heart','duration' => '00:03:13']);
        \DB::table('songs')->insert(['genre_id' => 4,'song_name' => 'Dragonborn part 3','artist_name' => 'Headhunterz','duration' => '00:03:30']);

        \DB::table('songs')->insert(['genre_id' => 5,'song_name' => 'Ik trip m','artist_name' => 'Natte Visstick & Dikke Baap','duration' => '00:03:07']);
        \DB::table('songs')->insert(['genre_id' => 5,'song_name' => 'Ameno','artist_name' => 'Vieze Asbak','duration' => '00:02:27']);
        \DB::table('songs')->insert(['genre_id' => 5,'song_name' => 'Lekkere Boterham','artist_name' => 'Vieze Asbak & Natte Visstick','duration' => '00:02:00']);

    }
}
