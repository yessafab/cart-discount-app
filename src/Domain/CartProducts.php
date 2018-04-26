<?php

require_once __DIR__ . '/Collection.php';

/**
 * CartProducts
 */
class CartProducts extends Collection
{
    /**
     * {@inheritdoc}
     */
    public function __construct(array $cartProducts = [])
    {
        foreach ($cartProducts as $cartProduct) {
            if (!is_object($cartProduct) || !$cartProduct instanceof CartProduct) {
                throw new InvalidArgumentException('All elements must be a CartProducts.');
            }
        }

        parent::__construct($cartProducts);
    }

    /**
     * @param CartProduct $cartProduct
     */
    public function addProductToCartCollection(CartProduct $cartProduct)
    {
            $this->items[] = $cartProduct;
    }
}
