<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('vendors')
            ->insert([
            [
                'name' => 'MG',
                'min_lead_days' => 3,
                'max_lead_days' => 5
            ],
            [
                'name' => 'RG Corporation',
                'min_lead_days' => 2,
                'max_lead_days' => 4
            ]
        ]);
    }
}
