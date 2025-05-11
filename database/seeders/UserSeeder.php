<?php

namespace Database\Seeders;

use App\Models\Owner;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class UserSeeder extends Seeder
{


    public function run(): void
    {
        User::create([
            "nama" => "owner 1",
            "no_telp" => "0439034934",
            "alamat" => "banjarmasin",
            "email" => "owner1@gmail.com",
            "password" => bcrypt("123456"),
            "role" => "user",
        ]);
        User::create([
            "nama" => "admin",
            "no_telp" => "039438434",
            "alamat" => "madium",
            "email" => "admin@gmail.com",
            "password" => bcrypt("123456"),
            "role" => "admin",
        ]);
    }
}
