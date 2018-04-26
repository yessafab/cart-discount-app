<?php

require_once __DIR__ . '/../../src/Domain/Discount.php';
require_once  __DIR__ . '/../../src/Enum/DiscountTypeEnum.php';

class DiscountTest extends \PHPUnit\Framework\TestCase
{
    public function testDiscount()
    {
        $discount = new Discount(
            1,
            "1",
            "2",
            DiscountTypeEnum::PRICE,
            1,
            100
        );

        $this->assertTrue($discount instanceof Discount);
        $this->assertEquals(1,$discount->id());
        $this->assertTrue(is_int($discount->id()));
        $this->assertEquals("1",$discount->productSku());
        $this->assertTrue(is_string($discount->productSku()));
        $this->assertEquals("2",$discount->promotedProductSku());
        $this->assertTrue(is_string($discount->promotedProductSku()));
        $this->assertEquals("price",$discount->discountType());
        $this->assertTrue(is_string($discount->discountType()));
        $this->assertEquals(1,$discount->minQuantity());
        $this->assertTrue(is_int($discount->minQuantity()));
        $this->assertEquals(100, $discount->discountedProductPrice());
        $this->assertTrue(is_int($discount->discountedProductPrice()));
        $this->assertEquals("1.00$", $discount->userDiscountedProductPrice());
        $this->assertTrue(is_string($discount->userDiscountedProductPrice()));
    }
}
