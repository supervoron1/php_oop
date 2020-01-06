<?php


namespace app\models\sample;


class PieceGoods extends Product
{
	public $price = Digital::BASE_PRICE * 2;

	public function __construct($quantity = null)
	{
		$this->quantity = $quantity;
	}

	public function __set($name, $value)
	{
		$this->$name = $value;
	}

	public function __get($name)
	{
		return $this->$name;
	}

	public function getGoodsName()
	{
		return 'штучных';
	}

}
