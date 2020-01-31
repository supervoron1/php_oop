<?php
include realpath("../config/config.php");
include realpath("../engine/Autoload.php");

use app\models\{Products, Users, Basket};
use app\engine\{Autoload, Db};

spl_autoload_register([new Autoload(), 'loadClass']);

/**
 * @var Products $product1 // чтобы увидел методы
 */

$product = new Products("Кофе", "Крепкий", 12);
$product->insert();
$product->delete();
var_dump($product);
$user = new Users();
var_dump($user->getOne(5));
echo '<hr>';
$product1 = Products::getOne(4);
var_dump($product1);
var_dump(get_class_methods($product1));
//var_dump($product->getOne(2));

//var_dump($product->getAll());

//echo $product->getAll();

