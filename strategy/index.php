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
    if($car->getBrand()->name == "bmw"){
        $discount = new BmwCouponGenerator();
        echo strtoupper($car->getBrand()->name) . PHP_EOL;
        echo "Seasonality discount : " . $discount->addSeasonDiscount($isHighSeason) . "%.";
        echo PHP_EOL;
        echo "Stock discount : " . $discount->addStockDiscount($bigStock) . "%.";
        echo PHP_EOL;
    }
    elseif($car->getBrand()->name == "mercedes"){
        $discount = new MercedesCouponGenerator();
        echo strtoupper($car->getBrand()->name) . PHP_EOL;
        echo "Seasonality discount : " . $discount->addSeasonDiscount($isHighSeason) . "%.";
        echo PHP_EOL;
        echo "Stock discount : " . $discount->addStockDiscount($bigStock) . "%.";
        echo PHP_EOL;
    }
    else {echo "We don't have cars of that brand in stock.";}
}
?>