<?php
include "../engine/Autoload.php";

use app\models\sample\{Digital, PieceGoods, Weight};
use app\models\{Model, Products, Users, Basket}; //in PHP 7 only
use app\engine\Db as Db; // если имя алиаса совпадает, то можно опустить
use app\engine\Autoload;
use app\interfaces\IModel;

spl_autoload_register([new Autoload(), 'loadClass']);

//spl_autoload_register('loader');
//function loader($className)
//{
//	(new Autoload())->loadClass($className);
//}

$product = new Products(new Db());
$product->price = 999;
$user = new Users(new Db());
$basket = new Basket(new Db());

function foo(IModel $model){
	$model->getAll();
}

var_dump($product);
var_dump($user);
//var_dump($basket);

echo $product->getOne(111) . '<br>';
echo $product->getAll() . '<hr>';
echo $user->getOne(33) . '<br>';
echo $user->addUser() . '<hr>';
echo $basket->getOne(7) . '<br>';
echo $basket->deleteAll() . '<hr>';

$prod = new Digital(7);
$prod2 = new PieceGoods(4);
$prod3 = new Weight(1.25, 120);
echo $prod->sumText() . $prod->getTotalPrice() . '<br>';
echo $prod->marginText() . $prod->getProfit() . '<hr>';
echo $prod2->sumText() . $prod2->getTotalPrice() . '<br>';
echo $prod2->marginText() . $prod2->getProfit() . '<hr>';
echo $prod3->sumText() . $prod3->getTotalPrice() . '<br>';
echo $prod3->marginText() . $prod3->getProfit() . '<hr>';
