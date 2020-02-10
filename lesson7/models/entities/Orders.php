<?php


namespace app\models\entities;


use app\models\Model;

class Orders extends Model
{
	protected $id;
	protected $login;
	protected $tel;
	protected $email;
	protected $order_status_id;

	protected $props = [
		'login' => false,
		'tel' => false,
		'email' => false,
		'order_status_id' => false
	];


	public function __construct($session_id = null, $login = null, $tel = null, $email = null, $order_status_id = null)
	{
		$this->session_id = $session_id;
		$this->login = $login;
		$this->tel = $tel;
		$this->email = $email;
		$this->order_status_id = $order_status_id;
	}
}
