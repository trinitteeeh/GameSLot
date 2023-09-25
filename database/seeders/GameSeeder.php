<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameSeeder extends Seeder
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
                'name' => 'Counter-Strike: GLobal Offensive',
                'description' => 'Counter-Strike: Global Offensive (CS:GO) is a 2012 multiplayer tactical first-person shooter developed by Valve and Hidden Path Entertainment. It is the fourth game in the Counter-Strike series. Developed for over two years, Global Offensive was released for OS X, PlayStation 3, Windows, and Xbox 360 in August 2012, and for Linux in 2014. Valve still regularly updates the game, both with smaller balancing patches and larger content additions.',
                'price' => 0,
                'pegi_rating' => 17,
                'image' => 'GM001.png',
                'genre_id' => '1'
            ],
            [
                'name' => 'Player Unknown battleground',
                'description' => 'Player Unknown battleground (PUBG) is a competitive survival shooter formally developed/published by Bluehole. PUBG is now being developed by PUBG Corp, a Bluehole subsidiary company [1] in cooperation with Brendan Greene (PLAYERUNKNOWN) as the Creative Director, PUBG is Greene first standalone game.',
                'price' => 30,
                'pegi_rating' => 13,
                'image' => 'GM002.png',
                'genre_id' => '1'
            ],
            [
                'name' => 'Apex Legends',
                'description' => 'Apex Legends is a free-to-play battle royale-hero shooter game developed by Respawn Entertainment and published by Electronic Arts. It was released for PlayStation 4, Windows, and Xbox One in February 2019, for Nintendo Switch in March 2021, and for PlayStation 5 and Xbox Series X/S in March 2022. A mobile version of the game designed for touchscreens titled Apex Legends Mobile was released in May 2022 on Android and iOS. The game supports cross-platform play, excluding the aforementioned mobile platforms.',
                'price' => 0,
                'pegi_rating' => 13,
                'image' => 'GM003.png',
                'genre_id' => '1'
            ],
            [
                'name' => 'Grand Theft Auto V',
                'description' => 'Grand Theft Auto V is a 2013 action-adventure game developed by Rockstar North and published by Rockstar Games. It is the seventh main entry in the Grand Theft Auto series, following 2008 Grand Theft Auto IV, and the fifteenth instalment overall. Set within the fictional state of San Andreas, based on Southern California, the single-player story follows three protagonists—retired bank robber Michael De Santa, street gangster Franklin Clinton, and drug dealer and gunrunner Trevor Philips—and their attempts to commit heists while under pressure from a corrupt government agency and powerful criminals. The open world design lets players freely roam San Andreas open countryside and the fictional city of Los Santos, based on Los Angeles.',
                'price' => 20,
                'pegi_rating' => 18,
                'image' => 'GM004.png',
                'genre_id' => '2'
            ],
            [
                'name' => 'Ark: Survival Evolved',
                'description' => 'Ark: Survival Evolved (stylized as ARK) is a 2017 action-adventure survival video game developed by Studio Wildcard. In the game, players must survive being stranded on one of several maps filled with roaming dinosaurs, fictional fantasy monsters, and other prehistoric animals, natural hazards, and potentially hostile human players.',
                'price' => 10,
                'pegi_rating' => 3,
                'image' => 'GM005.png',
                'genre_id' => '5'
            ],
            [
                'name' => 'Terraria',
                'description' => 'Ark: Survival Evolved (stylized as ARK) is a 2017 action-adventure survival video game developed by Studio Wildcard. In the game, players must survive being stranded on one of several maps filled with roaming dinosaurs, fictional fantasy monsters, and other prehistoric animals, natural hazards, and potentially hostile human players.',
                'price' => 5,
                'pegi_rating' => 3,
                'image' => 'GM006.png',
                'genre_id' => '2'
            ]

        ];
        DB::table('games')->insert($data);
    }
}
