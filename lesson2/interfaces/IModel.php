<?php

namespace app\interfaces;


interface IModel // может иметь константы и заготовки ТОЛЬКО публичные методы (они абстрактные - только тело)
{
	public function getOne($id);

	public function getAll();

	public function getTableName();
}
