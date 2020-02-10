<?php


namespace app\controllers;


use app\engine\Request;
use app\models\Products;
use app\models\repositories\ProductRepository;

class ProductController extends Controller
{

    public function actionIndex() {
        echo $this->render('index');
    }

    public function actionCatalog()
    {
        $page = (int)(new Request())->getParams()['page'];;

        $catalog = (new ProductRepository())->showLimit(($page + 2) * 2);
        echo $this->render('catalog', [
            'catalog' => $catalog,
            'page' => ++$page
        ]);
    }

    public function actionApiCatalog()
    {
        $catalog = (new ProductRepository())->getAll();
        echo json_encode($catalog, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function actionCard()
    {
        $id = (int)(new Request())->getParams()['id'];
        $product = (new ProductRepository())->getOne($id);
        echo $this->render('card', ['product' => $product]);
    }



}
