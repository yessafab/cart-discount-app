<?php

require_once __DIR__ . "/../../src/Infrastructure/DiscountRepository.php";
require_once __DIR__ . "/../../src/Application/DiscountAssembler.php";

class DiscountAssemblerTest extends \PHPUnit\Framework\TestCase
{
    public function testDiscountToDomainObject()
    {
        $repository =  new DiscountRepository();
        $discountAssembler = new DiscountAssembler($repository);
        $discount = $discountAssembler->discountToDomainObject('9325336130810');

        $this->assertTrue($discount instanceof Discount);
        $this->assertEquals("1", $discount->id());
        $this->assertEquals("9325336130810", $discount->productSku());
        $this->assertEquals("9325336028278", $discount->promotedProductSku());
        $this->assertEquals("free_item", $discount->discountType());
        $this->assertEquals(1, $discount->minQuantity());
        $this->assertEquals(1999, $discount->discountedProductPrice());
    }
}
