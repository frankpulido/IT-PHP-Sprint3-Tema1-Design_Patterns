<?php
declare(strict_types=1);
require_once "carCouponGenerator.php";
class UndefinedCouponGenerator implements CarCouponGenerator {
    public function addSeasonDiscount(bool $season) : int {
        $discount = ($season)? 0 : 0;
        return $discount;
    }
    public function addStockDiscount(bool $stock) : int {
        $discount = ($stock)? 0 : 0;
        return $discount;}
}
?>