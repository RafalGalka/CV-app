<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->truncate();


        DB::table('clients')->insert([
            [
                'id' => 1,
                'name' => 'Laboratorium Control',
                'short_name' => 'Control',
                'address' => 'ul. Witkiewicza 16, 03-305 Warszawa',
                'comment' => '',
                'activ' => true,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ],
            [
                'id' => 2,
                'name' => 'Unibep S.A.',
                'short_name' => 'Unibep',
                'address' => 'ul. 3 Maja 19, 17-100 Bielsk Podlaski',
                'comment' => '',
                'activ' => true,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ],
            [
                'id' => 3,
                'name' => 'Dom Construction Sp. z o.o.',
                'short_name' => 'Dom Construction',
                'address' => 'Pl. Piłsudskiego 3, 00-078 Warszawa',
                'comment' => '',
                'activ' => true,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ],
            [
                'id' => 4,
                'name' => 'PTB Tranzyt',
                'short_name' => 'Tranzyt',
                'address' => 'ul. Przemysłowa 3b/24, 62-510 Konin',
                'comment' => '',
                'activ' => true,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ],
            [
                'id' => 5,
                'name' => 'Skanska S.A.',
                'short_name' => 'Skanska',
                'address' => 'Aleja "Solidarności" 173, 00-877 Warszawa',
                'comment' => '',
                'activ' => true,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ],
            [
                'id' => 6,
                'name' => 'Devanco Sp. z o.o.',
                'short_name' => 'Devanco',
                'address' => 'ul. Burakowska 16a/48, 01-066 Warszawa',
                'comment' => '',
                'activ' => true,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ],
            [
                'id' => 7,
                'name' => 'FineTech Sp. z o.o.',
                'short_name' => 'FineTech',
                'address' => 'ul.Bobrowiecka 8, 00-728 Warszawa',
                'comment' => '',
                'activ' => true,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ],
            [
                'id' => 8,
                'name' => 'MIX Sp. z o.o.',
                'short_name' => 'MIX',
                'address' => 'ul. Heroldów 6, 01-991 Warszawa',
                'comment' => '',
                'activ' => true,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ],
            [
                'id' => 9,
                'name' => 'Mos-Tech Sp. z o.o.',
                'short_name' => 'Mos-Tech',
                'address' => 'ul. Mokra 2, 26-600 Radom',
                'comment' => '',
                'activ' => true,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ],
            [
                'id' => 10,
                'name' => 'PBW Inżynieria Jacek Garbacz',
                'short_name' => 'PBW Inżynieria',
                'address' => 'ul.Pochyła 23 lok.4D, 53-512 Wrocław',
                'comment' => '',
                'activ' => true,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ],
            [
                'id' => 11,
                'name' => 'PP-BUD Sp. z o.o.',
                'short_name' => 'PP-BUD',
                'address' => 'ul. Trakt Lubelski 163/35',
                'comment' => '',
                'activ' => true,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ],
            [
                'id' => 12,
                'name' => 'Polimex Infrastruktura Sp. z o.o.',
                'short_name' => 'Polimex Infrastruktura',
                'address' => 'al. Jana Pawła 12, 00-124 Warszawa',
                'comment' => '',
                'activ' => true,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ],
            [
                'id' => 13,
                'name' => 'AB Industry S.A.',
                'short_name' => 'AB Industry',
                'address' => 'ul. Wojska Polskiego 7, 05-850 Macierzysz',
                'comment' => '',
                'activ' => true,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ],
            [
                'id' => 14,
                'name' => 'Rex-Bud Budownictwo Sp. z o.o. S.K.A.',
                'short_name' => 'Rex-Bud Budownictwo',
                'address' => 'ul. Nieszawska 6/8, 93-119 Łódź',
                'comment' => '',
                'activ' => true,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ],
            [
                'id' => 15,
                'name' => 'Firma Budowlana ANNA-BUD Sp. Z o.o.',
                'short_name' => 'ANNA-BUD',
                'address' => 'ul. Rondo ONZ 1, p. 10, 00-124 Warszawa',
                'comment' => '',
                'activ' => true,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ],
            [
                'id' => 16,
                'name' => 'HEXACON Sp. z o.o.',
                'short_name' => 'HEXACON',
                'address' => 'ul. Kościelna 16, 05-200 Wołomin',
                'comment' => '',
                'activ' => true,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ],
            [
                'id' => 17,
                'name' => 'J.N. Developer Robert Niewiadomski',
                'short_name' => 'J.N. Developer',
                'address' => 'ul. Klamrowa 11, 03-685 Warszawa',
                'comment' => '',
                'activ' => true,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ],
            [
                'id' => 18,
                'name' => 'Centrum Technologiczne BETOTECH Sp. z o.o.',
                'short_name' => 'BETOTECH / GB',
                'address' => 'ul. Roździeńskiego 14, 41-306 Dąbrowa Górnicza',
                'comment' => '',
                'activ' => true,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ],
            [
                'id' => 19,
                'name' => 'BBR Polska Sp. z o.o.',
                'short_name' => 'BBR Polska',
                'address' => 'ul. Annopol 14, 03-236 Warszawa',
                'comment' => '',
                'activ' => true,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ],
            [
                'id' => 20,
                'name' => 'Betoniarnia Łagów',
                'short_name' => 'Betocem',
                'address' => 'ul. Opatowska 21a, Łagów',
                'comment' => '',
                'activ' => true,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ],
        ]);
    }
}
