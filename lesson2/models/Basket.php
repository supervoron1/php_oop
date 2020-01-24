<?php


namespace app\models;


class Basket extends Model
{
	public $id;
	public $product_id;
	public $name;
	public $amount;
	public $price;
	public $totalAmount;

	public function getTableName()
	{
		return 'basket';
	}

	public function countCart()
	{
		return 'total amount';
	}

	public function addProduct($id_product, $amount)
	{
		return 'product is added';
	}

	public function deleteProduct($id_product, $amount = 1)
	{
		return 'deleted';
	}

	public function deleteAll()
	{
		return 'basket is empty';
	}
}
