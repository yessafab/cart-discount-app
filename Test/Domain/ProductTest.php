<?php

require_once __DIR__ . '/../../src/Domain/Product.php';
require_once __DIR__ . '/../../src/Domain/Discount.php';

class ProductTest extends \PHPUnit\Framework\TestCase
{
    public function testProduct() {
        $product = new Product('1','title',100);

        $this->assertTrue($product instanceof Product);
        $this->assertEquals('1',$product->sku());
        $this->assertTrue(is_string($product->sku()));
        $this->assertEquals('title',$product->title());
        $this->assertTrue(is_string($product->title()));
        $this->assertEquals(100,$product->price());
        $this->assertTrue(is_int($product->price()));
        $this->assertEquals("1.00$",$product->userPrice());
        $this->assertTrue(is_string($product->userPrice()));
    }
}
