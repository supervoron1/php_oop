<h2>Каталог</h2>
<?foreach ($catalog as $item):?>
    <img src="/img/<?=$item['image']?>" alt="" width="100"><br>
    <a href="/product/card/?id=<?=$item['id']?>"><h3><?=$item['name']?></h3></a>
    <p>Цена: <?=$item['price']?></p>
<?endforeach;?>

<a href="/product/catalog/?page=<?=$page?>">Показать еще</a>
