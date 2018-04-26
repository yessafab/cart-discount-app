<?php

require_once __DIR__ . "/../Domain/Discount.php";

class DiscountAssembler
{
    /**
     * @var DiscountRepository
     */
    protected $discountRepository;

    /**
     * @param DiscountRepository $discountRepository
     */
    public function __construct(DiscountRepository $discountRepository)
    {
        $this->discountRepository = $discountRepository;
    }

    /**
     * @param string $sku
     * @return Discount|null
     */
    public function discountToDomainObject(string $sku)
    {
        $discountArray = $this->discountRepository->getDiscountByProductSku($sku);
        if (empty($discountArray)){

            return null;
        }

        $discount = $discountArray[0];

        return new Discount(
            $discount["id"],
            $discount["product_sku"],
            $discount["promoted_product_sku"],
            $discount["discount_type"],
            $discount["min_quantity"],
            $discount["discounted_product_price"]
        );
    }
}