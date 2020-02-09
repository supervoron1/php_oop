<?php


namespace app\models;



abstract class Model
{
    public function __set($name, $value)
    {
        $this->$name = $value;
        $this->props[$name] = true;
    }

    public function __get($name) {
       //TODO сделать if (property_exists())
        return $this->$name;
    }

    public function __isset($name)
    {
        return isset($this->$name);
    }
}