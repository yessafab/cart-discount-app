<?php

require_once __DIR__ . '/../../src/Application/ProductAssembler.php';
require_once __DIR__ . '/../../src/Application/CartAssembler.php';
require_once __DIR__ . '/../../src/Application/DiscountAssembler.php';
require_once __DIR__ . '/../../src/Infrastructure/ProductRepository.php';
require_once __DIR__ . '/../../src/Infrastructure/DiscountRepository.php';

class CartAssemblerTest extends \PHPUnit\Framework\TestCase
{
    public function testGetCartProducts()
    {
        $productRepository = new ProductRepository();
        $productAssembler = new ProductAssembler($productRepository);
        $discountRepository = new DiscountRepository();
        $discountAssembler = new DiscountAssembler($discountRepository);
        $cartAssembler = new CartAssembler($productAssembler, $discountAssembler);

        $cartProducts = $cartAssembler->getCartProducts(3, '9781430219484');
        /** @var CartProduct $cartProduct */
        $cartProduct = $cartProducts->getItems()[0];
        $this->assertEquals(3, $cartProduct->quantity());
        $this->assertEquals(5744, $cartProduct->price());

        $cartProducts = $cartAssembler->getCartProducts(10, '9780201835953');
        /** @var CartProduct $cartProduct */
        $cartProduct = $cartProducts->getItems()[0];
        $this->assertEquals(10, $cartProduct->quantity());
        $this->assertEquals(21990, $cartProduct->price());

        $cartProducts = $cartAssembler->getCartProducts(1, '9325336130810');
        /** @var CartProduct $cartProduct */
        $cartProduct = $cartProducts->getItems()[0];
        $this->assertEquals(1, $cartProduct->quantity());
        $this->assertEquals(3949, $cartProduct->price());
        $cartProduct = $cartProducts->getItems()[1];
        $this->assertEquals(1, $cartProduct->quantity());
        $this->assertEquals(0, $cartProduct->price());
    }
}
