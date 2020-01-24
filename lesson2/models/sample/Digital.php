<?php


namespace app\models\sample;


class Digital extends Product
{
	const BASE_PRICE = 100;
	public $price = self::BASE_PRICE;

	public function __construct($quantity = null)
	{
		$this->quantity = $quantity;
	}

	public function getGoodsName()
	{
		return 'цифровых';
	}

}
