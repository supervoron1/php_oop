<?php
session_start();

use app\controllers\Controller;
use app\models\{Basket, Product, Users};
use app\engine\{Autoload, Db};

include realpath("../config/config.php");
include realpath("../engine/Autoload.php");

spl_autoload_register([new Autoload(), 'loadClass']);

// $url = explode('/', $_SERVER['REQUEST_URI']);
// var_dump($url);
// $controllerName = $_GET['c']? : 'product';
// $action = $_GET['a'];

$controllerUrl = Controller::getUrl();
//var_dump($controllerUrl);
if (empty($controllerUrl)) {
  //var_dump($controller);
  Controller::actionIndex();
} else {
  $controllerName = $controllerUrl[0];
  $controllerAction = $controllerUrl[1];
  $controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";
  //var_dump($controllerClass);
    if (class_exists($controllerClass)) {
      //var_dump($controllerClass);
      $controller = new $controllerClass();
      $controller->runAction($controllerAction);
    } else {
      echo "404 - Missing controller";
    }
}

//$controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";
//var_dump($controllerClass);






