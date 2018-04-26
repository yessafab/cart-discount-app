<?php

/**
 * DiscountRepository
 */
class DiscountRepository
{
    /**
     * @param string
     *
     * @return array
     */
    public function getDiscountByProductSku(string $sku): array
    {
        $discountsArray = $this->getAllDiscounts();

        $discounts = [];
        foreach ($discountsArray as $discountArray) {
            if ($discountArray['product_sku'] === $sku) {
                $discounts[] = $discountArray;
            }
        }

        return $discounts;
    }

    /**
     * @return array
     */
    private function getAllDiscounts(): array
    {
        $discountsJson = file_get_contents(__DIR__ . '/../../fixtures/discounts.json');
        $discountsArray = json_decode($discountsJson, true);

        return $discountsArray["discounts"];
    }
}