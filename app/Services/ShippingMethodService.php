<?php

namespace App\Services;

use App\Models\ShippingMethod;

class ShippingMethodService
{
    public function checkMethodAvailability(string $method): bool
    {
        $data = ShippingMethod::firstWhere('name', $method);

        return $data !== null;
    }

    public function getEstimatedDeliveryDays(string $method): array
    {
        $data = ShippingMethod::firstWhere('name', $method);

        return [
            'min' => $data->min_delivery_days,
            'max' => $data->max_delivery_days
        ];
    }
}
