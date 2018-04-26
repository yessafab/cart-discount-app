<?php

require_once __DIR__ . '/../Enum/CurrencyEnum.php';
require_once  __DIR__ . '/../Enum/DiscountTypeEnum.php';

/**
 * Discount
 */
class Discount
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $productSky;

    /**
     * @var string
     */
    protected $promotedProductSku;

    /**
     * @var string
     */
    protected $discountType;

    /**
     * @var int
     */
    protected $minQuantity;

    /**
     * @var int
     */
    protected $discountedProductPrice;

    /**
     * @param int $id
     * @param string $productSku
     * @param string $promotedProductSku
     * @param string $discountType
     * @param int $minQuantity
     * @param int $discountedProductPrice
     */
    public function __construct(
        int $id,
        string $productSku,
        string $promotedProductSku,
        string $discountType,
        int $minQuantity,
        int $discountedProductPrice
    ){
        $this->id = $id;
        $this->productSky = $productSku;
        $this->promotedProductSku = $promotedProductSku;
        $this->discountType = $discountType;
        $this->minQuantity = $minQuantity;
        $this->discountedProductPrice = $discountedProductPrice;
    }

    /**
     * @return int
     */
    public function id(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function productSku(): string
    {
        return $this->productSky;
    }

    /**
     * @return string
     */
    public function promotedProductSku(): string
    {
        return $this->promotedProductSku;
    }

    /**
     * @return string
     */
    public function discountType(): string
    {
        return $this->discountType;
    }

    /**
     * @return int
     */
    public function minQuantity(): int
    {
        return $this->minQuantity;
    }

    /**
     * @return int
     */
    public function discountedProductPrice(): int
    {
        return $this->discountedProductPrice;
    }

    public function userDiscountedProductPrice(): string
    {
        return number_format($this->discountedProductPrice()/100, 2) . CurrencyEnum::AUD;
    }

    public function isTypePrice(): bool
    {
        return $this->discountType() === DiscountTypeEnum::PRICE ? true : false;
    }

    public function isTypeFreeProduct(): bool
    {
        return $this->discountType() === DiscountTypeEnum::FREE_ITEM ? true : false;
    }

    public function isTypeFreeSameProduct(): bool
    {
        return $this->discountType() === DiscountTypeEnum::FREE_SAME_ITEM ? true : false;
    }
}
