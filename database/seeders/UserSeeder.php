<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [[
            'name' => 'admin',
            'role_id' => 1,
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'address' => Str::random(30),
            'gender' => 'male',
        ],
        [
            'name' => 'subscriber',
            'role_id' => 2,
            'email' => 'subscriber@gmail.com',
            'password' => Hash::make('password'),
            'address' => Str::random(30),
            'gender' => 'female',
        ]];

        DB::table('users')->insert($users);
    }
}
