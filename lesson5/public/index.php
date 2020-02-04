<?php
include realpath("../config/config.php");
include realpath("../engine/Autoload.php");

use app\models\{Products, Users, Basket};
use app\engine\{Autoload, Render, TwigRender};

spl_autoload_register([new Autoload(), 'loadClass']);
include realpath("../vendor/Autoload.php");

$url = explode('/', $_SERVER['REQUEST_URI']);

$controllerName = $url[1] ?: 'product';
$actionName = $url[2];


$controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";
if (class_exists($controllerClass)) {
    $controller = new $controllerClass(new TwigRender());
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

