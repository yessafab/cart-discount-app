<?php

require_once __DIR__ . '/../../src/Domain/Product.php';
require_once __DIR__ . '/../../src/Domain/CartProduct.php';
require_once __DIR__ . '/../../src/Domain/Cart.php';
require_once __DIR__ . '/../../src/Application/ProductAssembler.php';
require_once __DIR__ . '/../../src/Application/CartAssembler.php';
require_once __DIR__ . '/../../src/Application/DiscountAssembler.php';
require_once __DIR__ . '/../../src/Infrastructure/ProductRepository.php';
require_once __DIR__ . '/../../src/Infrastructure/DiscountRepository.php';

class CartTest extends \PHPUnit\Framework\TestCase
{
    public function testCart()
    {
        $productRepository = new ProductRepository();
        $productAssembler = new ProductAssembler($productRepository);
        $discountRepository = new DiscountRepository();
        $discountAssembler = new DiscountAssembler($discountRepository);
        $cartAssembler = new CartAssembler($productAssembler, $discountAssembler);
        $cart = new Cart($cartAssembler);

        $this->assertTrue($cart instanceof Cart);
    }

    public function testAddToCart()
    {
        $productRepository = new ProductRepository();
        $productAssembler = new ProductAssembler($productRepository);
        $discountRepository = new DiscountRepository();
        $discountAssembler = new DiscountAssembler($discountRepository);
        $cartAssembler = new CartAssembler($productAssembler, $discountAssembler);

        $cart = new Cart($cartAssembler);
        $cart->addToCart(1, "9780132071482");
        $this->assertEquals(1,$cart->cartProducts->count());

        $cart->addToCart(1, "9780132071482");
        $this->assertEquals(2,$cart->cartProducts->count());

    }

    public function testGetCartTotal()
    {
        $productRepository = new ProductRepository();
        $productAssembler = new ProductAssembler($productRepository);
        $discountRepository = new DiscountRepository();
        $discountAssembler = new DiscountAssembler($discountRepository);
        $cartAssembler = new CartAssembler($productAssembler, $discountAssembler);

        $cart = new Cart($cartAssembler);
        $cart->addToCart(1, "9780132071482");
        $this->assertEquals('119.92$', $cart->getCartTotal());

        $cart->addToCart(1, "9780132071482");
        $this->assertEquals('239.84$', $cart->getCartTotal());
    }
}
