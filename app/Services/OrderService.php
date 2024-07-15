<?php

namespace App\Services;

use App\MyOrder;
use App\Models\Inventory;

class OrderService
{
    public function __construct(
        private ShippingMethodService $shippingMethodService,
        private CityService $cityService,
        private VendorService $vendorService
    ) {}

    public function calculateDeliveryTime(MyOrder $order): string
    {
        // Get backordered lead time if applicable
        $backorderedItemTime = $this->getBackOrderedLeadTime($order->products);

        // Get shipping method delivery days
        $deliveryDays = $this->getShippingTime($order->shippingMethod);

        // Add longest lead time of backordered items
        if ($backorderedItemTime > 0) {
            $deliveryDays['min'] += $backorderedItemTime;
            $deliveryDays['max'] += $backorderedItemTime;
        }

        // Add 1 day if location not in major cities
        if (! $this->cityService->isUrban($order->location)) {
            $deliveryDays['min']++;
            $deliveryDays['max']++;
        }

        return "{$deliveryDays['min']}-{$deliveryDays['max']} business days";
    }

    private function getShippingTime(string $method): array
    {
        $data = $this->shippingMethodService
                    ->getEstimatedDeliveryDays($method);

        return $data;
    }

    private function getBackOrderedLeadTime(array $products): int
    {
        $productIds = array_column($products, 'id');
        
        // Get vendorids of backordered Items
        $vendorIds = Inventory::whereIn('id', $productIds)
                                ->where('available_quantity', '<', 1)
                                ->pluck('vendor_id')
                                ->toArray();   
                                
        if (count($vendorIds) === 0 ) {
            return 0;
        }

        // Get max lead days among vendors of backoredered items
        $max_lead_days = $this->vendorService->getMaxLeadTime($vendorIds);

        return $max_lead_days;
    }
}
