<?php

namespace App\Services;

use App\Models\City;

class CityService
{
    public function isUrban(string $city): bool
    {
        $data = City::firstWhere('name', $city);

        return $data->is_urban;
    }
}
