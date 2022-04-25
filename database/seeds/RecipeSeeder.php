<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recipes')->truncate();


        DB::table('recipes')->insert([
            [
                'id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'investment_id' => 1,
                'recipe_number' => '630508',
                'strenght_class' => 'C25/30',
                'rate_time' => 28,
                'waterproof' => 'W8',
                'w_days' => 56,
                'properties' => '',
                'comment' => '',
                'activ' => true,
            ],
            [
                'id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'investment_id' => 1,
                'recipe_number' => '637508',
                'strenght_class' => 'C30/37',
                'rate_time' => 56,
                'waterproof' => 'W10',
                'w_days' => 56,
                'properties' => 'F150/56d',
                'comment' => '',
                'activ' => true,
            ],
            [
                'id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'investment_id' => 2,
                'recipe_number' => 'A-037',
                'strenght_class' => 'C30/37',
                'rate_time' => 28,
                'waterproof' => 'W8',
                'w_days' => 28,
                'properties' => 'XC4',
                'comment' => 'Cemex',
                'activ' => false,
            ],
        ]);
    }
}
