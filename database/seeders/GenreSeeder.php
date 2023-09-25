<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
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
                'name' => 'FPS'
            ],
            [
                'name' => 'Sandbox'
            ],            [
                'name' => 'RTS'
            ],
            [
                'name' => 'RPG'
            ],            [
                'name' => 'Survival'
            ]
        ];
        DB::table('genres')->insert($data);
    }
}
