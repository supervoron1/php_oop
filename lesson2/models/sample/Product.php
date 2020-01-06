<?php


namespace app\models\sample;


abstract class Product
{
	const MARGIN = 30;
	public $price;
	public $quantity;

	public function getTotalPrice()
	{
		return $this->price * $this->quantity;
	}

	public function getMarginRate()
	{
		return Product::MARGIN / 100 + 1;
	}

	public function getProfit()
	{
		return $this->price * $this->quantity * $this->getMarginRate();
	}

	abstract public function getGoodsName();

	public function sumText()
	{
		return "Стоимость всех {$this->getGoodsName()} товаров: ";
	}

	public function marginText()
	{
		return "Прибыль с продажи {$this->getGoodsName()} товаров: ";
	}
}
