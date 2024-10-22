<?php
declare(strict_types=1);
require "car.php";

$discount = 0;
$isHighSeason = false;
$bigStock = true;

$car1 = new Car(Brand::bmw, 50000);
$car2 = new Car(Brand::mercedes, 60000);
$car3 = new Car(Brand::lexus, 45000);

echo PHP_EOL;
echo "Discounts on our car brands :" . PHP_EOL;
discounts($car1, $isHighSeason, $bigStock);
echo PHP_EOL;
discounts($car2, $isHighSeason, $bigStock);
echo PHP_EOL;
discounts($car3, $isHighSeason, $bigStock);
echo PHP_EOL;

function discounts($car, $isHighSeason, $bigStock) {
    $couponGenerator = $car->brandDiscounts();
    $couponSeason = $couponGenerator->addSeasonDiscount($isHighSeason);
    $couponStock = $couponGenerator->addStockDiscount($bigStock);
    echo strtoupper($car->getBrand()->name) . PHP_EOL;
    echo "Price : " . $car->getPrice() . " €." . PHP_EOL;
    echo "Seasonality discount : " . $couponSeason . "%.";
    echo PHP_EOL;
    echo "Stock discount : " . $couponStock . "%.";
    echo PHP_EOL;
    echo "Discounted price : " . ($car->getPrice() * (1-$couponSeason/100) * (1-$couponStock/100)) . " €." . PHP_EOL;
    echo PHP_EOL;
    echo "** Important note ** Our discounts are applied successively : Price x (1 - seasonality discount) x (1 - stock discount)";
    echo PHP_EOL;
}
?>