<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShippingMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('shipping_methods')
            ->insert([
                [
                    'name' => 'USPS',
                    'min_delivery_days' => 3,
                    'max_delivery_days' => 4,
                ], [
                    'name' => 'Freight',
                    'min_delivery_days' => 3,
                    'max_delivery_days' => 3,
                ], [
                    'name' => 'Overnight',
                    'min_delivery_days' => 1,
                    'max_delivery_days' => 2,
                ],
            ]);
    }
}
