<div class="container">
    <h2>Каталог продуктов</h2>
    <div class="catalog d-flex flex-wrap justify-content-center justify-content-md-between mt-4">
			<? foreach ($catalog as $item): ?>
          <div class="card mb-3" style="width: 15rem;">
              <div class="card-body text-center p-3">
                  <a href="<?= '/product/item/' . $item['id'] ?>">
                      <h5 class="card-title"><?= $item['name'] ?></h5>
                      <img id="<?= $item['id'] ?>" src="/img/<?= $item['image'] ?>"
                           class="card-img-top" alt="img"></a>
                  <h5 class="card-subtitle mb-3">Цена: <?= $item['price'] ?></h5>
                  <a href="#" class="btn btn-primary">Купить</a>
              </div>
          </div>
			<? endforeach; ?>
    </div>
    <button class="also btn btn-outline-primary mb-3" id="also">Показать еще</button>
</div>
