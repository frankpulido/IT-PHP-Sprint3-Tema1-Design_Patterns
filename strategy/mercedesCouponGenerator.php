<?php
declare(strict_types=1);
require_once "carCouponGenerator.php";
class MercedesCouponGenerator implements CarCouponGenerator {
    public function addSeasonDiscount(bool $season) : int {
        $discount = ($season)? 4 : 0;
        return $discount;
    }
    public function addStockDiscount(bool $stock) : int {
        $discount = ($stock)? 10 : 0;
        return $discount;}
}
?>