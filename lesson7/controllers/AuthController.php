<?php

namespace app\controllers;

use app\engine\Request;
use app\models\repositories\UserRepository;
//use app\models\entities\Users;

class AuthController extends Controller
{
	public function actionLogin()
	{
		$login = (new Request())->getParams()['login'];
		$pass = (new Request())->getParams()['pass'];
		if ((new UserRepository())->auth($login, $pass)) {
			if (isset((new Request())->getParams()['save'])) {
				(new UserRepository())->updateHash();
			}
			header("Location: " . $_SERVER['HTTP_REFERER']);
		} else {
			header("Location: /");
//			Die("Не верный пароль!");
		};
	}

	public function actionLogout()
	{
		session_regenerate_id();
		session_destroy();
		setcookie('hash', '', time() - 3600, '/');
		header("Location: /");
		exit();
	}

}
