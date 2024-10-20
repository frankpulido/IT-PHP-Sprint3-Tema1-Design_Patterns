<?php
declare(strict_types=1);
require_once "carCouponGenerator.php";
class BmwCouponGenerator implements CarCouponGenerator {
    public function addSeasonDiscount(bool $season) : int {
        $discount = ($season)? 5 : 0;
        return $discount;
    }
    public function addStockDiscount(bool $stock) : int {
        $discount = ($stock)? 7 : 0;
        return $discount;}
}
?>