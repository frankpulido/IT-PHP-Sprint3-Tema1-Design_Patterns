<?php
declare(strict_types=1);
interface CarCouponGenerator {
    public function addSeasonDiscount(bool $season);
    public function addStockDiscount(bool $stock);
}
?>