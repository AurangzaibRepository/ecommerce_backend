<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')
            ->insert([
                [
                    'name' => 'Gloves',
                    'available_quantity' => 4,
                ],
                [
                    'name' => 'Shoes',
                    'available_quantity' => 5,
                ],
                [
                    'name' => 'Helmet',
                    'available_quantity' => 10,
                ],
            ]);
    }
}
