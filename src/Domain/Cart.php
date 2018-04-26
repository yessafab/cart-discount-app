<?php

require_once __DIR__ . '/../Enum/CurrencyEnum.php';

/**
 * Cart
 */
class Cart
{
    /**
     * @var CartAssembler
     */
    protected $cartAssembler;

    /**
     * @var CartProducts
     */
    public $cartProducts;

    /**
     * @param CartAssembler $cartAssembler
     */
    public function __construct(CartAssembler $cartAssembler)
    {
        $this->cartAssembler = $cartAssembler;
    }

    /**
     * @param int $quantity
     * @param string $sku
     */
    public function addToCart(int $quantity, string $sku)
    {
        $cartProducts = $this->cartAssembler->getCartProducts($quantity, $sku);
        foreach ($cartProducts->getItems() as $cartProduct) {
            if (is_null($this->cartProducts)) {
                $this->cartProducts = new CartProducts([$cartProduct]);
            } else {
                $this->cartProducts->addProductToCartCollection($cartProduct);
            }
        }
    }

    /**
     * @return string
     */
    public function getCartTotal(): string
    {
        $total = 0;
        foreach ($this->cartProducts->getItems() as $cartProduct) {
            /** @var CartProduct  $cartProduct */
            $total = $total + $cartProduct->price();
        }

        return number_format($total/100, 2) . CurrencyEnum::AUD;
    }
}