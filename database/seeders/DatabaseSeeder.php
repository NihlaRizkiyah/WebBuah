<?php

namespace Database\Seeders;

use App\Models\Facility;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // $user = new User();
        // $user->name = "admin";
        // $user->email = "admin@gmail.com";
        // $user->photo = "no_image.png";
        // $user->password = Hash::make('admin');
        // $user->save();


        $wisata = new Facility();
        $wisata->nama = "Restoran";
        $wisata->save();

        $wisata = new Facility();
        $wisata->nama = "Mesjid";
        $wisata->save();

        $wisata = new Facility();
        $wisata->nama = "Wifi";
        $wisata->save();

        $wisata = new Facility();
        $wisata->nama = "Toilet";
        $wisata->save();

        $wisata = new Facility();
        $wisata->nama = "Parkir";
        $wisata->save();

        $wisata = new Facility();
        $wisata->nama = "Penginapan";
        $wisata->save();
    }
}
