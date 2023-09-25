<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'admin',
                'email' => 'admin@example.com',
                'password' => bcrypt('admin'),
                'image' => 'null',
                'role' => 'admin',
                'gender' => 'male',
                'dob' => '2000-10-10'
            ],
            [
                'name' => 'user',
                'email' => 'user@example.com',
                'password' => bcrypt('user'),
                'image' => 'null',
                'role' => 'user',
                'gender' => 'female',
                'dob' => '1999-11-10'
            ]
        ];
        DB::table('users')->insert($data);
    }
}
