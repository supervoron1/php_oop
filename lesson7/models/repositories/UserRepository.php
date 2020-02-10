<?php

namespace app\models\repositories;

use app\engine\Db;
use app\models\entities\Users;
use app\models\Repository;

class UserRepository extends Repository
{
	public function isAdmin()
	{
		return ($_SESSION['login'] === 'admin') ? true : false;
	}

	public function isAuth()
	{
		if (isset($_COOKIE['hash']) && !isset($_SESSION['login'])) {
    		$hash = $_COOKIE['hash'];
    		$user = $this->getOneWhere('hash', $hash)->login;

    		if(!empty($user)){
    			$_SESSION['login'] = $user;
		    }
		}
		return isset($_SESSION['login']);
	}

	public function getName()
	{
		return $_SESSION['login'];
	}

	public function auth($login, $pass)   //проверка верно ли введены данные для авторизации
	{
		$user = $this->getOneWhere('login', $login);
		if (password_verify($pass, $user->pass)) {
			$_SESSION['login'] = $login;
			$_SESSION['id'] = $user->id;
			return true;
		} else {
			return false;
		}
	}

	function updateHash(){
		$hash = uniqid(rand(), true);
		$id = (int)$_SESSION['id'];
//		$user = new Users();
		$user = $this->getOne($id);
		$user->id = $id;
		$user->hash = $hash;
		(new UserRepository())->save($user);
		setcookie('hash', $hash, time() + 3600, '/');
	}

	public function getEntityClass()
	{
		return Users::class;
	}

	public function getTableName()
	{
		return "users";
	}
}
