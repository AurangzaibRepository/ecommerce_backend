<?php

namespace App;

class MyOrder
{
    public array $products;
    public string $shippingMethod;
    public string $location;

    public function setProducts(array $products)
    {
        $this->products = $products;
    }

    public function setShippingMethod(string $method)
    {
        $this->shippingMethod = $method;
    }

    public function setLocation(String $location)
    {
        $this->location = $location;
    }
}
