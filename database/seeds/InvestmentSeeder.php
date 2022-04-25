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
                'name' => 'Park Skandynawia - Warszawa, ul. Ostrobramska, etap 2',
                'short_name' => 'Park Skandynawia, ul. Ostrobramska e.2',
                'comment' => '',
                'detail_picking' => '',
                'activ' => true,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ],
            [
                'id' => 2,
                'client_id' => '2',
                'name' => 'SOHO II - Warszawa, ul. Żupnicza',
                'short_name' => 'SOHO II, ul. Żupnicza',
                'comment' => '',
                'detail_picking' => '',
                'activ' => true,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ],
            [
                'id' => 3,
                'client_id' => '1',
                'name' => 'AAbfb',
                'short_name' => 'sss"',
                'comment' => '',
                'detail_picking' => '',
                'activ' => true,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ],
        ]);
    }
}
