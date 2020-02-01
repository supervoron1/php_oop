<?php
/**
 * @var \app\models\Product $product
 */
?>
<div class="item d-flex justify-content-center mt-3">
    <div class="card mb-3" style="width: 30rem;">
        <a href="/product/catalog/" " class="close text-right p-2" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </a>
        <div class="card-body text-center p-3">
            <h5 class="card-title"><?= $product->name ?></h5>
            <img src="/img/<?= $product->image ?>"
                 class="card-img-top" alt="img">
            <p class="card-subtitle mb-3 text-muted"><?= $product->description ?></p>
            <h5 class="card-subtitle mb-3">Цена: <?= $product->price ?></h5>
            <a href="#" class="btn btn-outline-primary mr-3">Купить</a>
            <a href="/product/catalog/" class="btn btn-outline-secondary">Назад</a>

        </div>
    </div>
</div>
