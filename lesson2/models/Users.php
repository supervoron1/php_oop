<?php

namespace app\models;


class Users extends Model
{
	public $id;
	public $login;
	public $pass;

//	protected $tableName = 'users';

	public function getTableName()
	{
		return 'users';
	}

	public function addUser()
	{
		return 'user added';
	}
}
