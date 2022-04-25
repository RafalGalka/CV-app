<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StrenghtClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('strenghtClasses')->truncate();

        DB::table('strenghtClasses')->insert([
            ['id' => 1, 'material_types' => 'beton', 'strenght_class' => 'C8/10', 'activ' => true],
            ['id' => 2, 'material_types' => 'beton', 'strenght_class' => 'C12/15', 'activ' => true],
            ['id' => 3, 'material_types' => 'beton', 'strenght_class' => 'C16/20', 'activ' => true],
            ['id' => 4, 'material_types' => 'beton', 'strenght_class' => 'C20/25', 'activ' => true],
            ['id' => 5, 'material_types' => 'beton', 'strenght_class' => 'C25/30', 'activ' => true],
            ['id' => 6, 'material_types' => 'beton', 'strenght_class' => 'C30/37', 'activ' => true],
            ['id' => 7, 'material_types' => 'beton', 'strenght_class' => 'C35/45', 'activ' => true],
            ['id' => 8, 'material_types' => 'beton', 'strenght_class' => 'C40/50', 'activ' => true],
            ['id' => 9, 'material_types' => 'beton', 'strenght_class' => 'C45/55', 'activ' => false],
            ['id' => 10, 'material_types' => 'beton', 'strenght_class' => 'C50/60', 'activ' => true],
            ['id' => 11, 'material_types' => 'beton', 'strenght_class' => 'C55/67', 'activ' => false],
            ['id' => 12, 'material_types' => 'podkład-ściskanie', 'strenght_class' => 'C5', 'activ' => false],
            ['id' => 13, 'material_types' => 'podkład-ściskanie', 'strenght_class' => 'C7', 'activ' => false],
            ['id' => 14, 'material_types' => 'podkład-ściskanie', 'strenght_class' => 'C12', 'activ' => true],
            ['id' => 15, 'material_types' => 'podkład-ściskanie', 'strenght_class' => 'C16', 'activ' => true],
            ['id' => 16, 'material_types' => 'podkład-ściskanie', 'strenght_class' => 'C20', 'activ' => true],
            ['id' => 17, 'material_types' => 'podkład-ściskanie', 'strenght_class' => 'C25', 'activ' => true],
            ['id' => 18, 'material_types' => 'podkład-ściskanie', 'strenght_class' => 'C30', 'activ' => false],
            ['id' => 19, 'material_types' => 'podkład-ściskanie', 'strenght_class' => 'C35', 'activ' => false],
            ['id' => 20, 'material_types' => 'podkład-ściskanie', 'strenght_class' => 'C40', 'activ' => false],
            ['id' => 21, 'material_types' => 'podkład-ściskanie', 'strenght_class' => 'C50', 'activ' => false],
            ['id' => 22, 'material_types' => 'podkład-zginanie', 'strenght_class' => 'F1', 'activ' => false],
            ['id' => 23, 'material_types' => 'podkład-zginanie', 'strenght_class' => 'F2', 'activ' => false],
            ['id' => 24, 'material_types' => 'podkład-zginanie', 'strenght_class' => 'F3', 'activ' => true],
            ['id' => 25, 'material_types' => 'podkład-zginanie', 'strenght_class' => 'F4', 'activ' => true],
            ['id' => 26, 'material_types' => 'podkład-zginanie', 'strenght_class' => 'F5', 'activ' => true],
            ['id' => 27, 'material_types' => 'podkład-zginanie', 'strenght_class' => 'F6', 'activ' => false],
            ['id' => 28, 'material_types' => 'podkład-zginanie', 'strenght_class' => 'F7', 'activ' => false],
            ['id' => 29, 'material_types' => 'podkład-zginanie', 'strenght_class' => 'F10', 'activ' => false],
            ['id' => 30, 'material_types' => 'zaprawa', 'strenght_class' => 'M5', 'activ' => false],
            ['id' => 31, 'material_types' => 'zaprawa', 'strenght_class' => 'M7,5', 'activ' => false],
            ['id' => 32, 'material_types' => 'zaprawa', 'strenght_class' => 'M10', 'activ' => true],
            ['id' => 33, 'material_types' => 'zaprawa', 'strenght_class' => 'M15', 'activ' => true],
            ['id' => 34, 'material_types' => 'zaprawa', 'strenght_class' => 'M20', 'activ' => true],
            ['id' => 35, 'material_types' => 'stabilizacja', 'strenght_class' => 'Rm0,5-1,5', 'activ' => true],
            ['id' => 36, 'material_types' => 'stabilizacja', 'strenght_class' => 'Rm1,5-2,5', 'activ' => true],
            ['id' => 37, 'material_types' => 'stabilizacja', 'strenght_class' => 'Rm2,5-5,0', 'activ' => true],
            ['id' => 38, 'material_types' => 'podbudowa', 'strenght_class' => 'C1,5/2', 'activ' => false],
            ['id' => 39, 'material_types' => 'podbudowa', 'strenght_class' => 'C3/4', 'activ' => true],
            ['id' => 40, 'material_types' => 'podbudowa', 'strenght_class' => 'C5/6', 'activ' => true],
            ['id' => 41, 'material_types' => 'inny', 'strenght_class' => 'inny', 'activ' => true],
        ]);
    }
}
