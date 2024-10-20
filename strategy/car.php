<?php
declare(strict_types=1);
require "brand.php";
require "bmwCouponGenerator.php";
require "mercedesCouponGenerator.php";

class Car {
    protected Brand $brand;
    protected float $price;
    public function __construct(Brand $brand, float $price)
    {
        $this->brand = $brand;
        $this->price = $price;
    }
    public function getBrand() : Brand {
        return $this->brand;
    }
    public function getPrice() : float {
        return $this->price;
    }
    public function setBrand(Brand $brand) {
        $this->brand = $brand;
    }
    public function setPrice(float $price) {
        $this->price = $price;
    }

    // Strategy for Discounts
    public function brandDiscounts() {
        if($this->brand->name == "bmw"){$discount = new BmwCouponGenerator();}
        if($this->brand->name == "mercedes"){$discount = new MercedesCouponGenerator();}
        return $discount;
    }
}
?>