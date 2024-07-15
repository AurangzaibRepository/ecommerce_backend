<?php

namespace App\Http\Controllers;

use App\MyOrder;
use App\Services\OrderService;
use App\Services\ShippingMethodService;

class HomeController extends Controller
{
    private $order;

    public function __construct(
        private ShippingMethodService $shippingMethodService,
        private OrderService $orderService,
    ) {
        // Creating static order object
        $this->order = new MyOrder();
        $this->order->setProducts([
            [
                'id' => 1,
                'name' => 'Shoes'
            ],
            [
                'id' => 2,
                'name' => 'Helmet',
            ]
        ]);
        $this->order->setShippingMethod('USPS');
        $this->order->setLocation('Kuala Lumpur');
    }

    public function index(): string
    {
        $dataArray = (array) $this->order;

        // If order is empty
        if (count($dataArray) === 0) {
            return 'Order is empty';
        }

        // If shipping method is not available
        if (! $this->shippingMethodService->checkMethodAvailability($this->order->shippingMethod)) {
            return "Shipping method {$this->order->shippingMethod} is not available";
        }

        // Calculate delivery time
        $deliveryTime = $this->orderService->calculateDeliveryTime($this->order);

        return "Delivery in {$deliveryTime}";
    }
}
