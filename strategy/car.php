<?php
declare(strict_types=1);
require "brand.php";
require "bmwCouponGenerator.php";
require "mercedesCouponGenerator.php";
require "undefinedCouponGenerator.php";

class Car {
    protected Brand $brand;
    protected float $price;
    //protected int $stock; this attribute must trigger addStockDiscount ($bigStock = true) when reaching a max and deactivate it ($bigStock = false) when stock lowers back to normal.

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
        elseif($this->brand->name == "mercedes"){$discount = new MercedesCouponGenerator();}
        else {$discount = new UndefinedCouponGenerator();}
        return $discount;
    }
}
?>