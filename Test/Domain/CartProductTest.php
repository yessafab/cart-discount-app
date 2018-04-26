<?php

require_once __DIR__ . '/../../src/Domain/CartProduct.php';

class CartProductTest extends \PHPUnit\Framework\TestCase
{
    public function testCartProduct()
    {
        $cartProduct = new CartProduct(10,'1','title',100);

        $this->assertTrue($cartProduct instanceof CartProduct);
        $this->assertEquals(10, $cartProduct->quantity());
        $this->assertTrue(is_int($cartProduct->quantity()));
        $this->assertEquals('1', $cartProduct->sku());
        $this->assertTrue(is_string($cartProduct->sku()));
        $this->assertEquals("title", $cartProduct->title());
        $this->assertTrue(is_string($cartProduct->title()));
        $this->assertEquals(100, $cartProduct->price());
        $this->assertTrue(is_int($cartProduct->price()));
        $this->assertEquals("1.00$", $cartProduct->userPrice());
        $this->assertTrue(is_string($cartProduct->userPrice()));
    }
}
