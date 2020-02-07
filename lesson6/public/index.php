<?php
session_start();
include realpath("../config/config.php");
include realpath("../engine/Autoload.php");

use app\models\{Products, Users, Basket};
use app\engine\{Autoload, Render, Request};

spl_autoload_register([new Autoload(), 'loadClass']);
include realpath("../vendor/Autoload.php");


$request = new Request();

$controllerName = $request->getControllerName();
$actionName = $request->getActionName();

$controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";
if (class_exists($controllerClass)) {
    $controller = new $controllerClass(new Render());
    $controller->runAction($actionName);
} else die("404");

//$product = new Products("Кофе", "Крепкий", 12);
//$product->insert();
//$product->delete();
//var_dump($product);

/**
 * @var Products $product
 */

//$product = new Products("Кофе", "Крепкий", 12);
//$product->save();
//var_dump($product);


//$product = Products::getOne(4);
//$product->price = 123; //Как перехватить это присваивание?

//$product->save();

//var_dump($product);
//$product->delete();


//var_dump($product->getAll());

//echo $product->getAll();

