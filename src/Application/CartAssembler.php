<?php

require_once  __DIR__ . '/../Enum/DiscountTypeEnum.php';
require_once  __DIR__ . '/../Domain/CartProduct.php';
require_once  __DIR__ . '/../Domain/CartProducts.php';

/**
 * CartAssembler
 */
class CartAssembler
{
    /**
     * @var ProductAssembler
     */
    protected $productAssembler;

    /**
     * @var DiscountAssembler
     */
    protected $discountAssembler;

    /**
     * @param ProductAssembler $productAssembler
     * @param DiscountAssembler $discountAssembler
     */
    public function __construct(ProductAssembler $productAssembler, DiscountAssembler $discountAssembler)
    {
        $this->productAssembler = $productAssembler;
        $this->discountAssembler = $discountAssembler;
    }

    /**
     * @param int $quantity
     * @param string $productSku
     *
     * @return CartProducts
     */
    public function getCartProducts(int $quantity, string $productSku): CartProducts
    {
        $product = $this->productAssembler->productToDomainObject($productSku);
        $discount = $this->discountAssembler->discountToDomainObject($productSku);
        $hasDiscount = $discount instanceof Discount;
        $cartProducts = [];

        if ($hasDiscount && $discount->isTypeFreeSameProduct()) {
            $cartProducts[] = $this->addProductsWithFreeSameProductDiscount($quantity, $product, $discount);
        } else {
            $cartProducts[] = new CartProduct(
                $quantity,
                $product->sku(),
                $product->title(),
                $hasDiscount && $discount->isTypePrice()
                    ? $this->calculatePriceForDiscountPriceType($quantity, $product, $discount)
                    : $product->price()
            );

            if ($hasDiscount && $discount->isTypeFreeProduct()) {
                $cartProducts[] = $this->addProductsWithFreeProductDiscount($quantity, $discount);
            }
        }

        return new CartProducts($cartProducts);
    }

    /**
     * @param int $quantity
     * @param Discount $discount
     *
     * @return CartProduct
     */
    private function addProductsWithFreeProductDiscount(int $quantity, Discount $discount): CartProduct
    {
        $freeProduct = $this->productAssembler->productToDomainObject($discount->promotedProductSku());
        $freeProductQuantity = floor($quantity / $discount->minQuantity());

        return new CartProduct($freeProductQuantity, $freeProduct->sku(), $freeProduct->title(), 0);
    }

    /**
     * @param int $quantity
     * @param Product $product
     * @param Discount $discount
     *
     * @return int
     */
    private function calculatePriceForDiscountPriceType(int $quantity, Product $product, Discount $discount): int
    {
        $price = $product->price();
        if ($quantity >= $discount->minQuantity()) {
            $price = $quantity * $discount->discountedProductPrice();
        }

        return $price;
    }

    /**
     * @param int $quantity
     * @param Product $product
     * @param Discount $discount
     *
     * @return CartProduct
     */
    private function addProductsWithFreeSameProductDiscount(
        int $quantity,
        Product $product,
        Discount $discount
    ): CartProduct {
        $quantityWithoutFreeProducts = $quantity;
        if ($quantity >= $discount->minQuantity()){
            $quantityWithoutFreeProducts = $quantity - floor($quantity / $discount->minQuantity());
        }

        return new CartProduct(
            $quantity,
            $product->sku(),
            $product->title(),
            $quantityWithoutFreeProducts * $product->price()
        );
    }
}