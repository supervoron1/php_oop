<?php

namespace app\models;


class Products extends Model
{
	protected $id;
	protected $name;
	protected $price;

//	protected $tableName = 'products';

	public function __construct($db, $id = null, $name = 'user', $price = null)
	{
		parent::__construct($db);
		$this->id = $id;
		$this->name = $name;
		$this->price = $price;
	}

	public function __set($name, $value)
	{
		$this->$name = $value;
	}

	public function __get($name)
	{
		return $this->$name;
	}

	public function getTableName()
	{
		return 'products';
	}


}
