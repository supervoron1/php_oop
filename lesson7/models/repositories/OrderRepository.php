<?php

namespace app\models\repositories;

use app\engine\Db;
use app\models\entities\Orders;
use app\models\Repository;

class OrderRepository extends Repository
{
	public function getOrder($id)
	{
		$sql = "SELECT * FROM basket, orders, products WHERE basket.session_id = orders.session_id AND products.id=basket.product_id AND orders.id = :id";
		return Db::getInstance()->queryAll($sql, ['id' => $id]);
	}

	public function getOrderSum($id){
		$sql = "SELECT SUM(products.price) as summ FROM basket, orders, products WHERE basket.session_id = orders.session_id AND products.id=basket.product_id AND orders.id = :id";
		return Db::getInstance()->queryAll($sql, ['id' => $id]);
	}

	public function getOrderStatus($id){
		$sql = "SELECT order_status.name FROM order_status INNER JOIN orders ON order_status.id = orders.order_status_id WHERE orders.id = :id";
		return Db::getInstance()->queryAll($sql, ['id' => $id]);
	}

	public function getEntityClass()
	{
		return Orders::class;
	}

	public function getTableName()
	{
		return "orders";
	}
}
