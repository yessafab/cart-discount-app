<?php

require_once __DIR__ . '/../../src/Infrastructure/DiscountRepository.php';

class DiscountRepositoryTest extends \PHPUnit\Framework\TestCase
{
    public function testGetDiscountByProductSku()
    {
        $repository =  new DiscountRepository();
        $discountArray = $repository->getDiscountByProductSku('9325336130810');

        $this->assertEquals(1, count($discountArray));
        $this->assertTrue(is_array($discountArray[0]));
        $this->assertArrayHasKey('id', $discountArray[0]);
        $this->assertArrayHasKey('product_sku', $discountArray[0]);
        $this->assertArrayHasKey('promoted_product_sku', $discountArray[0]);
        $this->assertArrayHasKey('discount_type', $discountArray[0]);
        $this->assertArrayHasKey('discount_type', $discountArray[0]);
        $this->assertArrayHasKey('discounted_product_price', $discountArray[0]);
        $this->assertEquals( 1,$discountArray[0]['id']);
        $this->assertEquals( '9325336130810',$discountArray[0]['product_sku']);
        $this->assertEquals( '9325336028278',$discountArray[0]['promoted_product_sku']);
        $this->assertEquals( 'free_item',$discountArray[0]['discount_type']);
        $this->assertEquals( 1,$discountArray[0]['min_quantity']);
        $this->assertEquals( 1999,$discountArray[0]['discounted_product_price']);
    }

    public function testGetDiscountBySkuNonExistentSku()
    {
        $repository =  new DiscountRepository();
        $discountArray = $repository->getDiscountByProductSku('YO');

        $this->assertEquals(0, count($discountArray));
        $this->assertTrue(is_array($discountArray));
    }

}
