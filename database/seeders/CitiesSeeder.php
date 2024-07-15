<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cities')
            ->insert([
                [
                    'name' => 'Kuala Lumpur',
                    'is_urban' => 1
                ],
                [
                    'name' => 'Malacca',
                    'is_urban' => 1
                ],
                [
                    'name' => 'Putrayajaya',
                    'is_urban' => 1
                ],
                [
                    'name' => 'Cyberjaya',
                    'is_urban' => 1
                ],
                [
                    'name' => 'Penang',
                    'is_urban' => 0
                ]
            ]);
    }
}
