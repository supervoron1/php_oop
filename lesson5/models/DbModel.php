<?php

namespace app\models;

use app\engine\Db;
use app\interfaces\IModel;

abstract class DbModel extends Model
{

	public static function showLimit($page)
	{
		$tableName = static::getTableName();
		$sql = "SELECT * FROM {$tableName} WHERE 1 LIMIT ?";
		return Db::getInstance()->executeLimit($sql, $page);
	}

	public static function getOne($id)
	{
		$tableName = static::getTableName();
		$sql = "SELECT * FROM {$tableName} WHERE id = :id";
		return Db::getInstance()->queryObject($sql, ['id' => $id], static::class);
	}

	public static function getAll()
	{
		$tableName = static::getTableName();
		$sql = "SELECT * FROM {$tableName}";
		return Db::getInstance()->queryAll($sql);
	}

	public function insert()
	{
		$params = [];
		$columns = [];
		//TODO Сделать цикл по props - DONE
		foreach ($this->props as $value) {
			$params[":{$value}"] = $this->$value;
			$columns[] = "`$value`";
		}
		$columns = implode(", ", $columns);
		$values = implode(", ", array_keys($params));

		$tableName = $this->getTableName();
		$sql = "INSERT INTO `{$tableName}`({$columns}) VALUES ({$values})";
		Db::getInstance()->execute($sql, $params);
		$this->id = Db::getInstance()->lastInsertId();
	}

	public function update()
	{
		$params = [];
		$columns = [];
		foreach ($this->props as $key => $value) {
			if (!$value) continue;
			$params[":{$key}"] = $this->$key;
			$columns[] .= "`" . $key . "` = :" . $key;
			$this->props[$key] = false;
		}
		$columns = implode(", ", $columns);
		$params[':id'] = $this->id;
		$tableName = static::getTableName();
		$sql = "UPDATE `{$tableName}` SET {$columns} WHERE `id` = :id";

		Db::getInstance()->execute($sql, $params);
	}

	public function save()
	{
		if (is_null($this->id))
			$this->insert();
		else
			$this->update();
	}

	public function delete()
	{
		$tableName = static::getTableName();
		$sql = "DELETE FROM {$tableName} WHERE id = :id";
		return Db::getInstance()->execute($sql, ['id' => $this->id]);
	}

	abstract public static function getTableName();
}
