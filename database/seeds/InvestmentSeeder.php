<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class InvestmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('investments')->truncate();


        DB::table('investments')->insert([
            [
                'id' => 1,
                'client_id' => '1',
                'name' => 'Laboratorium Control',
                'short_name' => 'Laboratorium Control',
                'comment' => '',
                'detail_picking' => '',
                'activ' => true,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ],
            [
                'id' => 2,
                'client_id' => '20',
                'name' => 'Betocem, Łagów',
                'short_name' => 'Betocem, Łagów',
                'comment' => '',
                'detail_picking' => '',
                'activ' => true,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ],
            [
                'id' => 3,
                'client_id' => '2',
                'name' => 'Budowa wielorodzinnego budynku mieszkalno-usługowego „19. Dzielnica”, przy ulicy Kolejowej w Warszawie.',
                'short_name' => '"19. Dzielnica", ul. Kolejowa',
                'comment' => '',
                'detail_picking' => '',
                'activ' => true,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ],
            [
                'id' => 4,
                'client_id' => '6',
                'name' => 'Budowa zlokalizowana w Warszawie przy ul. Modularnej.',
                'short_name' => 'ul. Modularna',
                'comment' => '',
                'detail_picking' => '',
                'activ' => true,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ],
            [
                'id' => 5,
                'client_id' => '18',
                'name' => 'Górażdże Beton, ul. Gniewkowska',
                'short_name' => 'ul. Gniewkowska, PL3P',
                'comment' => '',
                'detail_picking' => '',
                'activ' => true,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ],
            [
                'id' => 6,
                'client_id' => '18',
                'name' => 'Górażdże Beton, ul. Pożarowa',
                'short_name' => 'ul. Pożarowa, PL4W',
                'comment' => '',
                'detail_picking' => '',
                'activ' => true,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ],
            [
                'id' => 7,
                'client_id' => '18',
                'name' => 'Górażdże Beton, ul. Chełmżyńska',
                'short_name' => 'ul. Chełmżyńska, PL4X',
                'comment' => '',
                'detail_picking' => '',
                'activ' => true,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ],
            [
                'id' => 8,
                'client_id' => '18',
                'name' => 'GB Pobranie na budowie',
                'short_name' => 'GB - na budowie',
                'comment' => 'Wpisać nazwę budowy w uwagach',
                'detail_picking' => '',
                'activ' => true,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ],
            [
                'id' => 9,
                'client_id' => '4',
                'name' => 'Budowa zlokalizowana w Warszawie przy ul. Szwedzkiej.',
                'short_name' => 'ul. Szwedzka',
                'comment' => '',
                'detail_picking' => '',
                'activ' => true,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ],
            [
                'id' => 10,
                'client_id' => '2',
                'name' => '"Rotunda Dynasy", Warszawa, ul. Oboźna 5.',
                'short_name' => '"Rotunda Dynasy", ul. Oboźna',
                'comment' => '',
                'detail_picking' => '',
                'activ' => true,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ],
            [
                'id' => 11,
                'client_id' => '2',
                'name' => 'Budowa wielorodzinnego budynku mieszkalnego "SOHO II", przy ulicy Żupniczej oraz Mińskiej w Warszawie.',
                'short_name' => '"SOHO II", ul. Żupnicza',
                'comment' => '',
                'detail_picking' => '',
                'activ' => true,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ],
            [
                'id' => 12,
                'client_id' => '2',
                'name' => '"Osiedle Latte" przy ul. Sokratesa w Warszawie.',
                'short_name' => '"Osiedle Late", ul. Sokratesa',
                'comment' => '',
                'detail_picking' => '',
                'activ' => true,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ],
            [
                'id' => 13,
                'client_id' => '3',
                'name' => '"Osiedle Ceramiczna" przy ul. Ceramicznej w Warszawie.',
                'short_name' => '"Osiedle Ceramiczna", ul. Ceramiczna',
                'comment' => '',
                'detail_picking' => '',
                'activ' => true,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ],
            [
                'id' => 14,
                'client_id' => '6',
                'name' => 'Budowa zlokalizowana w Ząbkach przy ul. Piłsudskiego.',
                'short_name' => 'Ząbki, ul. Piłsudskiego',
                'comment' => '',
                'detail_picking' => '',
                'activ' => true,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ],
            [
                'id' => 15,
                'client_id' => '8',
                'name' => 'Budowa zlokalizowana w miejscowości Leszno przy ul. Fabrycznej.',
                'short_name' => 'Leszno, ul. Fabryczna',
                'comment' => '',
                'detail_picking' => '',
                'activ' => true,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ],
            [
                'id' => 16,
                'client_id' => '8',
                'name' => 'Budowa zlokalizowana w miejscowości Sękocin.',
                'short_name' => 'Sękocin',
                'comment' => '',
                'detail_picking' => '',
                'activ' => true,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ],
            [
                'id' => 17,
                'client_id' => '8',
                'name' => 'Budowa zlokalizowana w miejscowości Pruszków przy ul. Błońskiej 14.',
                'short_name' => 'Pruszków, ul. Błońska',
                'comment' => '',
                'detail_picking' => '',
                'activ' => true,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ],
            [
                'id' => 18,
                'client_id' => '9',
                'name' => 'Budowa zlokalizowana przy ul. Posag 7 Panien w Warszawie etap V.',
                'short_name' => 'ul. Posag 7 Panien, etap V',
                'comment' => '',
                'detail_picking' => '',
                'activ' => true,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ],
            [
                'id' => 19,
                'client_id' => '10',
                'name' => 'Inwestycja w m. Kosewko.',
                'short_name' => 'Kosewko',
                'comment' => '',
                'detail_picking' => '',
                'activ' => true,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ],
            [
                'id' => 20,
                'client_id' => '10',
                'name' => 'Budowa na terenie inwestycji Muzeum Wojska Polskiego położonej przy ul. Matarewicza 150, w Ossowie.',
                'short_name' => 'Ossów - MWP',
                'comment' => '',
                'detail_picking' => '',
                'activ' => true,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ],
            [
                'id' => 21,
                'client_id' => '11',
                'name' => 'Budowa zlokalizowana w Józefowie przy ul. Wyszyńskiego 12.',
                'short_name' => 'Józefów, ul. Wyszyńskiego 12',
                'comment' => '',
                'detail_picking' => '',
                'activ' => true,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ],
            [
                'id' => 22,
                'client_id' => '12',
                'name' => 'Przebudowa, rozbudowa i nadbudowa budynku biurowego przy ul. Pory 80 w Warszawie.',
                'short_name' => 'ul. Pory 80',
                'comment' => '',
                'detail_picking' => '',
                'activ' => true,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ],
            [
                'id' => 23,
                'client_id' => '13',
                'name' => 'Budowa zakładu produkcyjnego Jar Aromaty Sp. z o.o., ul. Zorzy w Klaudynie.',
                'short_name' => 'Klaudyn, ul. Zorzy',
                'comment' => '',
                'detail_picking' => '',
                'activ' => true,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ],
            [
                'id' => 24,
                'client_id' => '14',
                'name' => 'Budowa zlokalizowana na ul. Annopol 3, Warszawa-Żerań.',
                'short_name' => 'ul. Annopol 3',
                'comment' => '',
                'detail_picking' => '',
                'activ' => true,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ],
            [
                'id' => 25,
                'client_id' => '16',
                'name' => 'Budowa budynku wielorodzinnego zlokalizowana przy ul. Bogusławskiego (obok numeru 18) w Warszawa.',
                'short_name' => 'ul. Bogusławskiego',
                'comment' => '',
                'detail_picking' => '',
                'activ' => true,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ],
            [
                'id' => 26,
                'client_id' => '19',
                'name' => 'Próby dostarczone przez Zleceniodawcę',
                'short_name' => 'Dostarczone przez BBR',
                'comment' => '',
                'detail_picking' => '',
                'activ' => true,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ],
            [
                'id' => 27,
                'client_id' => '19',
                'name' => 'Próby odebrane',
                'short_name' => 'Próby odebrane od BBR',
                'comment' => 'Jeżeli inne miejsce odbioru niż ul. Annopol to wpisać w uwagach',
                'detail_picking' => '',
                'activ' => true,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ],
            [
                'id' => 28,
                'client_id' => '7',
                'name' => '„BOHEMA etap F” zlokalizowana w Warszawie przy ul. Szwedzkiej.',
                'short_name' => '"BOHEMA etap F", ul. Szwedzka',
                'comment' => '',
                'detail_picking' => '',
                'activ' => true,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ],
            [
                'id' => 29,
                'client_id' => '5',
                'name' => 'Park Skandynawia - Warszawa, ul. Ostrobramska, etap 2',
                'short_name' => 'Park Skandynawia, ul. Ostrobramska e.2',
                'comment' => '',
                'detail_picking' => '',
                'activ' => true,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ],
        ]);
    }
}
