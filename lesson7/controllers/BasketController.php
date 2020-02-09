<?php


namespace app\controllers;


use app\engine\Request;
use app\models\entities\Basket;
use app\models\repositories\BasketRepository;
use app\models\repositories\UserRepository;

class BasketController extends Controller
{
	public function actionIndex()
	{
		$session = session_id();
		$basket = (new BasketRepository())->getBasket($session);
		$basketSum = (new BasketRepository())->getBasketSum($session);
		echo $this->render('basket', [
			'products' => $basket,
			'basketSum' => $basketSum,
			'auth' => (new UserRepository())->isAuth(),
			'username' => (new UserRepository())->getName(),
		]);
	}

	public function actionDelete()
	{
		$id = (new Request())->getParams()['id'];
		$basket = (new BasketRepository())->getOne($id);
		$session = session_id();
		if ($session == $basket->session_id) {
			(new BasketRepository())->delete($basket);
		}

		header('Content-Type: application/json');
		$count = (new BasketRepository())->getCountWhere('session_id', session_id());
		$sum = (new BasketRepository())->getBasketSum(session_id());
		echo json_encode(['status' => 'Товар удален из корзины', 'id' => $id, 'count' => $count, 'sum' => $sum]);
	}

	public function actionAddToBasket()
	{
		$id = (new Request())->getParams()['id'];
		$basket = new Basket(session_id(), $id);
		(new BasketRepository())->save($basket);


		header('Content-Type: application/json');
		$count = (new BasketRepository())->getCountWhere('session_id', session_id());
		$sum = (new BasketRepository())->getBasketSum(session_id());
		echo json_encode(['status' => 'Товар добавлен в корзину', 'count' => $count, 'sum' => $sum]);
		die;
	}
}
