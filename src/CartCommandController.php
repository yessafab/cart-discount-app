<?php

require_once __DIR__ . "/Infrastructure/ProductRepository.php";
require_once __DIR__ . "/Infrastructure/DiscountRepository.php";
require_once __DIR__ . "/Application/ProductAssembler.php";
require_once __DIR__ . "/Application/CartAssembler.php";
require_once __DIR__ . "/Application/DiscountAssembler.php";
require_once __DIR__ . "/Domain/Cart.php";

/**
 * CartCommandController
 */
class CartCommandController
{
    public function addToCartCommand()
    {
        $productRepository = new ProductRepository();
        $productAssembler = new ProductAssembler($productRepository);
        $discountRepository  = new DiscountRepository();
        $discountAssembler = new DiscountAssembler($discountRepository);
        $cartAssembler = new CartAssembler($productAssembler, $discountAssembler);

        $cartProductsMock = [
            ['quantity' => 3, 'sku'=> '9781430219484'],
            ['quantity' => 10, 'sku'=> '9780201835953'],
            ['quantity' => 1, 'sku'=> '9325336130810'],
        ];

        $cart = new Cart($cartAssembler);
        foreach ($cartProductsMock as $cartProductMock) {
            $cart->addToCart($cartProductMock['quantity'], $cartProductMock['sku']);
        }

        foreach ($cart->cartProducts->getItems() as $cartProduct) {
            /** @var CartProduct $cartProduct */
            $cartProductString = $cartProduct->quantity() . " x "
                . $cartProduct->sku() . " "
                . $cartProduct->title() . " "
                . $cartProduct->userPrice() . "\n";

            echo $cartProductString;
        }

        $total = " -- -- --\nTotal: " . $cart->getCartTotal() . "\n";
        echo ($total);
    }
}

$cartCommandController = new CartCommandController();
$cartCommandController->addToCartCommand();