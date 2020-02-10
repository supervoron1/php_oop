<?php

use app\models\entities\Products;

class ProductTest extends \PHPUnit\Framework\TestCase {
    public function testProduct() {
        $name = "Сахар";
        $price = 1;
        //$name = "sdfsdfsdfsd#%$%D###D";
        $product = new Products($name, null, $price);
        $this->assertEquals($name, $product->name);
        $this->assertEquals($price, $product->price);
    }
    //strpos(Product::class, "app\\") === 0
    //array_slice(explode("\\", get_class(new Product())), 1, 1)===['models']
    //substr_count(Product::class, "\\" ) === 3
}