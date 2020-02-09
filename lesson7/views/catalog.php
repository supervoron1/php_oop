<h2>Каталог</h2>
<div id="status-info"></div>
<hr>
<div class="catalog">
<?foreach ($catalog as $item):?>
    <div class="item">
    <img src="/img/<?=$item['image']?>" alt="" width="100"><br>
    <a href="/product/card/?id=<?=$item['id']?>"><h3><?=$item['name']?></h3></a>
    <p>Цена: <?=$item['price']?></p>
    </a><button data-id="<?= $item['id']?>" class="buy">Купить</button><br>
    </div>

<?endforeach;?>
</div>
<a href="/product/catalog/?page=<?=$page?>" class="btn">Показать еще</a>

<script>
    let buttons = document.querySelectorAll('.buy');
    buttons.forEach((elem) => {
        elem.addEventListener('click', () => {
            let id = elem.getAttribute('data-id');
            (
                async () => {
                    const response = await fetch('/basket/AddToBasket/', {
                        method: 'POST',
                        headers: new Headers({
                            'Content-Type': 'application/json'
                        }),
                        body: JSON.stringify({
                            id: id
                        })
                    });
                    const answer = await response.json();
                    document.getElementById('count').innerText = answer.count;
                    document.getElementById('status-info').innerText = answer.status;
                    console.log(answer);
                }
            )();
        })
    });
</script>
