<?php

require_once __DIR__ . '/../../src/Infrastructure/ProductRepository.php';
require_once  __DIR__ . '/../../src/Application/ProductAssembler.php';
require_once __DIR__ . '/../../src/Domain/Product.php';

class ProductAssemblerTest extends \PHPUnit\Framework\TestCase
{
    public function testProductToDomainObject()
    {
        $repository =  new ProductRepository();
        $productAssembler = new ProductAssembler($repository);
        $product = $productAssembler->productToDomainObject('9325336130810');

        $this->assertTrue($product instanceof Product);
        $this->assertEquals("9325336130810", $product->sku());
        $this->assertEquals("Game of Thrones: Season 1", $product->title());
        $this->assertEquals("39.49$", $product->userPrice());
    }
}
