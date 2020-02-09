<?php


namespace app\controllers;


use app\engine\Request;
use app\models\entities\Users;
use app\models\repositories\UserRepository;

class RegistrationController extends Controller
{
	public function actionIndex()
	{
		echo $this->render('registration');
	}

	public function actionAddUser()
	{
		$login = (new Request())->getParams()['login'];
		$pass = (new Request())->getParams()['password'];

		if ($login == '') unset($login);
		if ($pass == '') unset($pass);
		if (empty($login) || empty($pass)) exit('Имя и пароль обязательные поля!');

		$email = (new Request())->getParams()['email'];
		$tel = (new Request())->getParams()['tel'];

		$login = trim(htmlspecialchars(strip_tags(stripslashes($login))));
		$pass = trim(htmlspecialchars(strip_tags(stripslashes($pass))));
		$email = trim(htmlspecialchars(strip_tags(stripslashes($email))));
		$tel = trim(htmlspecialchars(strip_tags(stripslashes($tel))));

		$pass = password_hash($pass, PASSWORD_DEFAULT);
		$hash = '';

		$user = new Users($login, $pass, $hash, $email, $tel);
		(new UserRepository())->save($user);

		header('Content-Type: application/json');
		echo json_encode(['message' => 'Новый пользователь был успешно добавлен.']);
		die;
	}

}
