<?php
declare(strict_types=1);
require "car.php";

$discount = 0;
$isHighSeason = false;
$bigStock = true;

$car1 = new Car(Brand::bmw, 50000);
$car2 = new Car(Brand::mercedes, 60000);

echo PHP_EOL;
echo "Discounts on our car brands :" . PHP_EOL;
discounts($car1, $isHighSeason, $bigStock);
echo PHP_EOL;
discounts($car2, $isHighSeason, $bigStock);
echo PHP_EOL;

function discounts($car, $isHighSeason, $bigStock) {
    if($car->getBrand()->name == "bmw"){$discount = new BmwCouponGenerator();}
    if($car->getBrand()->name == "mercedes"){$discount = new MercedesCouponGenerator();}
    $couponSeason = $discount->addSeasonDiscount($isHighSeason);
    $couponStock = $discount->addStockDiscount($bigStock);

    echo strtoupper($car->getBrand()->name) . PHP_EOL;
    echo "Seasonality discount : " . $couponSeason . "%.";
    echo PHP_EOL;
    echo "Stock discount : " . $couponStock . "%.";
    echo PHP_EOL;
}
?>