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
                'name' => 'Skanska S.A.',
                'short_name' => 'Skanska',
                'address' => 'Aleja "Solidarności" 173, 00-877 Warszawa',
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
        ]);
    }
}
