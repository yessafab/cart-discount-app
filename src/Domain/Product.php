<?php

require_once __DIR__ . "/../Enum/CurrencyEnum.php";

class Product
{
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
     * @param string $sku
     * @param string $title
     * @param int $price
     */
    public function __construct(string $sku, string $title, int $price)
    {
        $this->sku = $sku;
        $this->title = $title;
        $this->price = $price;
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