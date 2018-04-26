<?php

require_once __DIR__ . "/../Domain/Product.php";

/**
 * ProductAssembler
 */
class ProductAssembler
{
    /**
     * @var ProductRepository
     */
    protected $productRepository;

    /**
     * @param ProductRepository $productRepository
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @param string $sku
     * @return Product/null
     */
    public function productToDomainObject(string $sku)
    {
        $productArray = $this->productRepository->getProductBySku($sku);
        if (empty($productArray)){
            throw new InvalidArgumentException('No product fund with sku: '. $sku);
        }
        $product = $productArray[0];

        return new Product($product["sku"], $product["title"], $product["price"]);
    }
}