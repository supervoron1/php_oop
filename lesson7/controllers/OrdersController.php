<?php

namespace app\controllers;

use app\engine\Request;
use app\models\entities\Orders;
use app\models\repositories\OrderRepository;
use app\models\repositories\UserRepository;

class OrdersController extends Controller
{
	public function actionIndex()
	{
		echo $this->render('orders', [
			'isAdmin' => (new UserRepository())->isAdmin(),
			'orders' => (new OrderRepository())->getAll(),
//			'status' => (new OrderRepository())->getOrderStatus($id)
		]);
	}

	public function actionAddOrder()
	{
		$session_id = session_id();
		$login = (new Request())->getParams()['login'];
		$tel = (new Request())->getParams()['tel'];
		$email = (new Request())->getParams()['email'];

		if ($login == '') unset($login);
		if ($email == '') unset($email);
		if ($tel == '') unset($tel);
		if (empty($login) || empty($email) || empty($tel)) exit('Заполните все поля!');

		$login = trim(htmlspecialchars(strip_tags(stripslashes($login))));
		$email = trim(htmlspecialchars(strip_tags(stripslashes($email))));
		$tel = trim(htmlspecialchars(strip_tags(stripslashes($tel))));
		$order_status_id = 1;

		$order = new Orders($session_id, $login, $tel, $email, $order_status_id);
		(new OrderRepository())->save($order);

		header('Content-Type: application/json');
		echo json_encode(['message' => 'Новый заказ был успешно размещен. Наш менеджер связется с Вами для уточнения деталей']);
		die;
	}

	public  function actionOrder(){
		$id = (int)(new Request())->getParams()['id'];
		$order = (new OrderRepository())->getOrder($id);
		$orderSum = (new OrderRepository())->getOrderSum($id);
		echo $this->render('order', [
			'order' => $order,
			'orderSum' => $orderSum
			]);
	}
}
