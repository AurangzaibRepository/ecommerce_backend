<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Vendor;
use Faker\Factory as Faker;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $vendorIds = Vendor::all()
                        ->pluck('id')
                        ->toArray();
        
        DB::table('inventory')
            ->insert([
                [
                    'name' => 'Shoes',
                    'available_quantity' => 2,
                    'vendor_id' => $faker->randomElement($vendorIds)
                ],
                [ 
                    'name' => 'Helmet',
                    'available_quantity' => 3,
                    'vendor_id' => $faker->randomElement($vendorIds)
                ],
                [
                    'name' => 'Shirt',
                    'available_quantity' => 1,
                    'vendor_id' => $faker->randomElement($vendorIds)
                ]
            ]);
    }
}
