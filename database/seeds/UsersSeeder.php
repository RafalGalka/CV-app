<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'Rafał Gałka',
                'email' => 'rafal@labb.pl',
                'password' => Hash::make('123ABCabc'),
                'phone' => '790294259',
                'admin' => 1,
                'IDCompany' => 1,
                'IDBudowy' => 1,
                'isControl' => 1,
                'isAuth' => 1,
                'comment' => '',
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ],
        ]);
    }
}
