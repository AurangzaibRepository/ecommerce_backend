<?php

namespace App\Services;

use App\Models\Vendor;

class VendorService
{
    public function getMaxLeadTime(array $vendorIds): int
    {
        // Get largest lead days among vendors
        $data = Vendor::whereIn('id', $vendorIds)
                    ->select('max_lead_days')
                    ->orderByDesc('max_lead_days')
                    ->first();

        return $data->max_lead_days;
    }
}