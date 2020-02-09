<?php


namespace app\models\repositories;


use app\engine\Db;

use app\models\entities\Basket;
use app\models\Repository;

class BasketRepository extends Repository
{

	public function getBasket($session)
	{
		$sql = "SELECT p.id id_prod, b.id id_basket, p.name, p.description, p.price FROM basket b,products p WHERE b.product_id=p.id AND session_id = :session";
		return Db::getInstance()->queryAll($sql, ['session' => $session]);
	}

	public function getBasketSum($session)
	{
		$sql = "SELECT SUM(products.price) AS basket_sum FROM basket, products WHERE basket.product_id = products.id AND session_id = :session";
		return Db::getInstance()->queryOne($sql, ['session' => $session]);
	}


	public function getEntityClass()
	{
		return Basket::class;
	}

	public function getTableName()
	{
		return "basket";
	}

}
