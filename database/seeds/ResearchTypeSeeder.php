<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResearchTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('researchTypes')->truncate();


        DB::table('researchTypes')->insert([
            [
                'id' => 1,
                'research_type' => 'Odwierty rdzeniowe',
                'activ' => true,
            ],
            [
                'id' => 2,
                'research_type' => 'Pull-off (naklejanie)',
                'activ' => true,
            ],
            [
                'id' => 3,
                'research_type' => 'Pull-off (zrywanie)',
                'activ' => true,
            ],
            [
                'id' => 4,
                'research_type' => 'Sklerometr (mł. Schmidta)',
                'activ' => true,
            ],
            [
                'id' => 5,
                'research_type' => 'Wilgotność - wycinanie',
                'activ' => true,
            ],
            [
                'id' => 6,
                'research_type' => 'Pobór/odbiór kruszywa',
                'activ' => true,
            ],
            [
                'id' => 7,
                'research_type' => 'Stabilizacja/podbudowa',
                'activ' => true,
            ],
            [
                'id' => 8,
                'research_type' => 'Wypożyczenie form',
                'activ' => true,
            ],
            [
                'id' => 9,
                'research_type' => 'Zwrot form',
                'activ' => true,
            ],
            [
                'id' => 10,
                'research_type' => 'Inne',
                'activ' => true,
            ],
        ]);
    }
}
