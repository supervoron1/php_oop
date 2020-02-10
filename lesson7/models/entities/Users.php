<?php

namespace app\models\entities;

use app\models\Model;

class Users extends Model
{
	protected $id = null;
	protected $login;
	protected $pass;
	protected $hash;
	protected $email;
	protected $tel;

	protected $props = [
		'login' => false,
		'pass' => false,
		'hash' => false,
		'email' => false,
		'tel' => false
	];


	public function __construct($login = null, $pass = null, $hash = null, $email = null, $tel = null)
	{
		$this->login = $login;
		$this->pass = $pass;
		$this->hash = $hash;
		$this->email = $email;
		$this->tel = $tel;
	}


}
