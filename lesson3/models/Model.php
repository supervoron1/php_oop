<?php

namespace app\models;

use app\engine\Db;
use app\interfaces\IModel;

abstract class Model implements IModel
{
//	/**
//	 * @var Db
//	 */
//	protected $db;
//
//	public function __construct()
//	{
//		$this->db = Db::getInstance();
//	}

//	public function getOne($id)
//	{
//		$sql = "SELECT * FROM {$this->getTableName()} WHERE id = :id";
//		return $this->db->queryOne($sql, ['id' => $id]);
//	}
//
//	public function getAll()
//	{
//		$sql = "SELECT * FROM {$this->getTableName()}";
//		return $this->db->queryAll($sql);
//	}

	public static function getOne($id)
	{
		$tableName = static::getTableName();
		$sql = "SELECT * FROM `{$tableName}` WHERE id = :id";
		var_dump($sql);
		return Db::getInstance()->queryObject($sql, ['id' => $id], static::class);
	}

	public static function getAll()
	{
		$tableName = static::getTableName();
		$sql = "SELECT * FROM `{$tableName}`";
		return Db::getInstance()->queryAll($sql);
	}

//    public function insert() {
//        foreach ($this as $key=>$value) {
//            //TODO исключить id и db при формировании строки запроса
//            echo $key . " " . $value . "<br>";
//        }
//        //TODO собрать валидный запрос к БД по $key и $value и выполнить его
//        $sql = "INSERT INTO `{$this->getTableName()}`() VALUES ()";
//        var_dump($sql);
//        //TODO и в поле id сохранить новый id (lastInsertId) $this->id = lastinsertId
//    }

	public function insert()
	{
		$tableName = $this->getTableName();
		foreach ($this as $key => $value) {
			if ($key !== "id" && $key !== "db") {
				$fields[] = "`$key`";
				$values[":{$key}"] = $value;
			}
		}
		$fields = implode(", ", $fields);
		$params = implode(", ", array_keys($values));
		$sql = "INSERT INTO `{$tableName}` ({$fields}) VALUES ({$params})";
		var_dump($sql);
		Db::getInstance()->execute($sql, $values);
		$this->id = Db::getInstance()->lastInsertId();
	}

	public function delete()
	{
		$tableName = $this->getTableName();
		$sql = "DELETE FROM `{$tableName}` WHERE `{$tableName}`.`id` = :id";
		var_dump($sql);
		Db::getInstance()->execute($sql, ['id' => $this->id]);
	}

	public function update()
	{

	}

	abstract public static function getTableName();
}
