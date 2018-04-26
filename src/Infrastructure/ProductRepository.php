<?php

/**
 * ProductRepository
 */
Class ProductRepository
{
    /**
     * @param string
     *
     * @return array
     */
    public function getProductBySku(string $sku): array
    {
        $productsArray = $this->getAllProducts();
        $product = [];
        foreach ($productsArray as $productArray) {
            if ($productArray['sku'] === $sku) {
                $product[] = $productArray;
            }
        }

        return $product;
    }

    /**
     * @return array
     */
    private function getAllProducts(): array
    {
        $productsJson = file_get_contents(__DIR__ . '/../../fixtures/products.json');
        $productsArray = json_decode($productsJson, true);

        return $productsArray["products"];
    }
}