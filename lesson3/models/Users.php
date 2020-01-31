<?php

namespace app\models;

class Users extends Model
{
    public $id;
    public $login;
    public $pass;

    public static function getTableName()
    {
        return "users";
    }


}
