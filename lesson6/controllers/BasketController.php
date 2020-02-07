<?php

namespace app\controllers;

use app\engine\Request;
use app\models\Basket;

class BasketController extends Controller
{
	public function actionIndex()
	{
		$session = session_id();
		$basket = Basket::getBasket($session);
		echo $this->render('basket', ['products' => $basket]);
	}

	public function actionAddToBasket()
	{
		$id = (new Request())->getParams()['id'];

		(new Basket(session_id(), $id))->save();

		header('Content-Type: application/json');
		echo json_encode(['status' => 'ok', 'count' => Basket::getCountWhere('session_id', session_id())]);
		die;
	}

	public function actionDeleteFromBasket()
	{
		$id = (new Request())->getParams()['id'];
		$session = session_id();
		$basket = Basket::getOne($id);
//		var_dump($basket);
		if ($session == $basket->session_id)
			$basket->delete();

		header('Content-Type: application/json');
		echo json_encode(['status' => 'ok', 'count' => Basket::getCountWhere('session_id', session_id())]);
		die;
	}
}
