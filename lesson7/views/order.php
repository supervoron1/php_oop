<h2>Детали заказа <a href='/orders/'> << </a></h2>
Заказ на сумму: <span id="summ"><?= $orderSum[0]['summ'] ?></span>
<div class="order_list">
	<b class="order-menu">
		<p>Фото</p>
		<p>Товар</p>
		<p>Цена</p>
	</b>
	<?foreach ($order as $item): ?>
		<div class="order_item">
			<p><img src="/img/<?=$item['image']?>" style="width: 60px"></p>
			<b class="" id="<?=$item['id']?>"><?=$item['name']?></b>
			<p><?=$item['price']?></p>
		</div>
	<? endforeach; ?>
</div>

<a href='/orders/' class="btn">Назад</a>
