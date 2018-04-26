<?php

require_once __DIR__ . '/../../src/Infrastructure/ProductRepository.php';

class ProductRepositoryTest extends \PHPUnit\Framework\TestCase
{
    public function testGetProductBySku()
    {
        $repository =  new ProductRepository();
        $productArray = $repository->getProductBySku("9325336130810");

        $this->assertEquals(1, count($productArray));
        $this->assertTrue(is_array($productArray[0]));
        $this->assertArrayHasKey('sku', $productArray[0]);
        $this->assertArrayHasKey('title', $productArray[0]);
        $this->assertArrayHasKey('price', $productArray[0]);
        $this->assertEquals( '9325336130810',$productArray[0]['sku']);
        $this->assertEquals( 'Game of Thrones: Season 1' ,$productArray[0]['title']);
        $this->assertEquals( 3949 ,$productArray[0]['price']);
    }

    public function testGetProductBySkuWithNonExistingSku()
    {
        $repository =  new ProductRepository();
        $productArray = $repository->getProductBySku("YO");

        $this->assertEquals(0, count($productArray));
        $this->assertTrue(is_array($productArray));
    }
}
