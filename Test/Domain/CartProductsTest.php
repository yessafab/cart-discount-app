<?php

require_once __DIR__ . '/../../src/Domain/Product.php';
require_once __DIR__ . '/../../src/Domain/CartProduct.php';
require_once __DIR__ . '/../../src/Domain/Cart.php';
require_once __DIR__ . '/../../src/Application/ProductAssembler.php';
require_once __DIR__ . '/../../src/Application/CartAssembler.php';
require_once __DIR__ . '/../../src/Application/DiscountAssembler.php';
require_once __DIR__ . '/../../src/Infrastructure/ProductRepository.php';
require_once __DIR__ . '/../../src/Infrastructure/DiscountRepository.php';

class CartProductsTest extends \PHPUnit\Framework\TestCase
{
    public function testCartProducts()
    {
        $cartProduct1 = new CartProduct(1,"sku", "title", 2);
        $cartProduct2 = new CartProduct(2,"sku", "title", 2);
        $cartProducts = new CartProducts([$cartProduct1, $cartProduct2]);

        $this->assertTrue($cartProducts instanceof CartProducts);
        $this->assertTrue($cartProducts->getItems()[0] instanceof  CartProduct);
        $this->assertTrue($cartProducts->getItems()[1] instanceof  CartProduct);
    }

    public function testAddProductToCartCollection()
    {
        $cartProduct1 = new CartProduct(1,"sku", "title", 2);
        $cartProduct2 = new CartProduct(2,"sku", "title", 2);
        $cartProduct3 = new CartProduct(3,"sku", "title", 2);
        $cartProducts = new CartProducts([$cartProduct1, $cartProduct2]);

        $this->assertTrue($cartProducts instanceof CartProducts);
        $this->assertTrue($cartProducts->getItems()[0] instanceof  CartProduct);
        $this->assertTrue($cartProducts->getItems()[1] instanceof  CartProduct);

        $cartProducts->addProductToCartCollection($cartProduct3);
        $this->assertTrue($cartProducts->getItems()[2] instanceof  CartProduct);
    }

    public function testCount()
    {
        $cartProduct1 = new CartProduct(1,"sku", "title", 2);
        $cartProduct2 = new CartProduct(2,"sku", "title", 2);
        $cartProduct3 = new CartProduct(3,"sku", "title", 2);
        $cartProducts1 = new CartProducts([$cartProduct1, $cartProduct2]);
        $cartProducts2 = new CartProducts([$cartProduct3]);


        $this->assertEquals(2, $cartProducts1->count());
        $this->assertEquals(1, $cartProducts2->count());
    }

    public function testGetItems()
    {
        $cartProduct1 = new CartProduct(1,"sku", "title", 2);
        $cartProduct2 = new CartProduct(2,"sku", "title", 2);
        $cartProducts = new CartProducts([$cartProduct1, $cartProduct2]);

        $this->assertTrue(is_array($cartProducts->getItems()));
        $this->assertEquals(2, count($cartProducts->getItems()));
    }
}
