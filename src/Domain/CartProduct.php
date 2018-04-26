<?php

require_once __DIR__ . '/../Enum/CurrencyEnum.php';

/**
 * CartProduct
 */
class CartProduct
{
    /**
     * @var int
     */
    protected $quantity;

    /**
     * @var string
     */
    protected $sku;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var int
     */
    protected $price;

    /**
     * @param int $quantity
     * @param string $sku
     * @param string $title
     * @param int $price
     */
    public function __construct(int $quantity, string $sku, string $title, int $price)
    {
        $this->quantity = $quantity;
        $this->sku = $sku;
        $this->title = $title;
        $this->price = $price;
    }

    /**
     * @return int
     */
    public function quantity(): int
    {
        return $this->quantity;
    }

    /**
     * @return string
     */
    public function sku(): string
    {
        return $this->sku;
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return $this->title;
    }

    /**
     * @return int
     */
    public function price(): int
    {
        return $this->price;
    }

    /**
     * @return string
     */
    public function userPrice(): string
    {
        return number_format($this->price()/100, 2) . CurrencyEnum::AUD;
    }
}