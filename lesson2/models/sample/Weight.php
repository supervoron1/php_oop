<?php


namespace app\models\sample;


class Weight extends Product
{
	public $weight;

	public function __construct($weight = null, $price = null)
	{
		$this->weight = $weight;
		$this->price = $price;
	}

	public function getTotalPrice()
	{
		return $this->price * $this->weight;
	}

	public function getProfit()
	{
		return $this->price * $this->weight * $this->getMarginRate();
	}

	public function getGoodsName()
	{
		return 'весовых';
	}
}
