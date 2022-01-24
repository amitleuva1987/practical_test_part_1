<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
          [
              'name' => 'Admin',
              'description' => Str::random(30),
          ],  
          [
            'name' => 'Subscriber',
            'description' => Str::random(30),
          ]
        ];

        DB::table('roles')->insert($roles);
    }
}
