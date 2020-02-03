<?php


namespace app\controllers;


use app\models\Products;

class ProductController extends Controller
{

    public function actionIndex() {
        echo $this->render('index');
    }

    public function actionCatalog()
    {
        //TODO не полагаться на значение по умолчанию $page и присвоить его явно
        $page = (int)$_GET['page'];
        $catalog = Products::showLimit(($page + 1) * 2);
        echo $this->render('catalog', [
            'catalog' => $catalog,
            'page' => ++$page,
        ]);
    }

    public function actionApiCatalog()
    {
        $catalog = Products::getAll();
        echo json_encode($catalog, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function actionCard()
    {
        $id = (int)$_GET['id'];
        $product = Products::getOne($id);
        echo $this->render('card', ['product' => $product]);
    }



}
