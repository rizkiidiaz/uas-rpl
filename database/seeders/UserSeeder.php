<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'nama_depan' => 'user',
            'nama_belakang' => 'test',
            'username' => 'usertest123',
            'no_telepon' => '088888888888',
            'email' => 'asep@gmail.com',
            'password' => '$2y$12$K4pvbZnUJgY.CkWwHGSJ7OgxGERd0W9qsvoNw3.e03uXbjTEL66/O',
            'alamat' => 'Jl.Surakarta Bandung 2022',
            'role' => 'seller',
          ]);
    }
}
