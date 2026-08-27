<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSistemFilmSeeder extends Seeder
{
    public function run(): void
    {

        $roleId = DB::table('roles')->insertGetId([
            'nama' => 'Kritikus',
            'created_at' => now(), 'updated_at' => now()
        ]);

        $profileId = DB::table('profiles')->insertGetId([
            'umur' => 20,
            'bio' => 'Tom Cruise enthusiast. Living life like Ethan Hunt. 0% CGI, 100% practical adrenaline.',
            'alamat' => 'Jl. Siliwangi No. 12, Karawang',
            'created_at' => now(), 'updated_at' => now()
        ]);

        $castId = DB::table('casts')->insertGetId([
            'nama' => 'Tom Cruise',
            'umur' => 64,
            'bio' => 'Ikon global dan aktor laga legendaris yang terkenal selalu melakukan aksi ekstrem berbahaya tanpa bantuan stuntman.',
            'created_at' => now(), 'updated_at' => now()
        ]);

        $genreId = DB::table('genres')->insertGetId([
            'nama' => 'Action',
            'created_at' => now(), 'updated_at' => now()
        ]);

        $userId = DB::table('users')->insertGetId([
            'name' => 'Rian Maulana',
            'email' => 'rian.' . Str::random(3) . '@maulanaa32.com', 
            'password' => Hash::make('rahasia123'), 
            'role_id' => $roleId,
            'profile_id' => $profileId,
            'created_at' => now(), 'updated_at' => now()
        ]);

        $filmId = DB::table('films')->insertGetId([
            'judul' => 'Mission: Impossible - Fallout',
            'ringkasan' => 'Ethan Hunt dan tim IMF berlomba dengan waktu untuk mencegah ledakan nuklir setelah misi pengamanan plutonium mengalami kegagalan.',
            'tahun' => 2018,
            'poster' => 'poster_mission_impossible_fallout.jpg',
            'genre_id' => $genreId,
            'created_at' => now(), 'updated_at' => now()
        ]);

        DB::table('perans')->insert([
            'nama' => 'Ethan Hunt',
            'film_id' => $filmId,
            'cast_id' => $castId,
            'created_at' => now(), 'updated_at' => now()
        ]);

        DB::table('kritiks')->insert([
            'content' => 'Mahakarya film aksi modern! Adegan kejar-kejaran helikopter dan lompatan HALO dilakukan nyata oleh Tom Cruise tanpa CGI. Sangat menegangkan!',
            'point' => 10,
            'user_id' => $userId,
            'film_id' => $filmId,
            'created_at' => now(), 'updated_at' => now()
        ]);
    }
}