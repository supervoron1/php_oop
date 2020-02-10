<h2>Корзина</h2>
<div id="status-info"></div>
<hr>

<? if (isset($basketSum['basket_sum'])): ?>
    <div class="basket_sum">Вы выбрали товаров на общую сумму: <span id="sum">
        <?= $basketSum['basket_sum'] ?></span><br><br></div>
<? else: ?>
    <div class="basket_empty">Корзина пуста</div>
<? endif; ?>
<div class="basket">
<? foreach ($products as $item): ?>
    <div id="<?= $item['id_basket'] ?>" class="item">
        <h4 class="item__header"><?= $item['name'] ?></h4>
        <p>Описание: <?= $item['description'] ?></p>
        <p>Цена: <?= $item['price'] ?></p>
        <button data-id="<?= $item['id_basket'] ?>" class="delete">Удалить</button>
    </div>
<? endforeach; ?>
</div>

<div class="infoMessage"></div>

<? if (!is_null($basketSum['basket_sum'])): ?>
 <div class="formOrder">
     <h2>Оформить заказ</h2>
     <form action="/orders/" method="post" class="formOrder">
       <? if ($auth): ?>
         <input placeholder="Ваше имя" type="text" name="name" value="<?= $username ?>" id="orderLogin">
         <input placeholder="Телефон" type="text" name="phone" id="orderPhone">
         <input placeholder="E-mail" type="text" name="address" id="orderEmail">
         <input type="button" value="Оформить" class="send_order">
       <? else: ?>
         <p>Пожалуйста, авторизуйтесь</p>
       <? endif; ?>
     </form>
 </div>
<? endif; ?>

<script>
  let buttons = document.querySelectorAll('.delete');

  buttons.forEach((elem) => {
    elem.addEventListener('click', () => {
      let id = elem.dataset.id;
      (
        async () => {
          const response = await fetch('/basket/delete/', {
            method: 'POST',
            headers: new Headers({
              'Content-Type': 'application/json'
            }),
            body: JSON.stringify({
              id: id,
            })
          });
          const answer = await response.json();
          console.log(answer);
          document.getElementById('count').innerText = answer.count;
          document.getElementById('sum').innerText = answer.sum['basket_sum'];
          document.getElementById('status-info').innerText = answer.status;
          document.getElementById(answer.id).remove();
          if (answer.count === '0') {
            document.querySelector('.basket_sum').innerHTML = 'Корзина пуста';
            document.querySelector('.formOrder').remove();
          }
        }
      )();
    })
  });
</script>

<script>
  let button = document.querySelector('.send_order');
  button.addEventListener('click', async () => {
    let login = document.getElementById('orderLogin').value;
    let tel = document.getElementById('orderPhone').value;
    let email = document.getElementById('orderEmail').value;

    let data = {login, tel, email};
    (
      async () => {
        const response = await fetch('/orders/AddOrder/', {
          method: 'POST',
          headers: new Headers({
            'Content-Type': 'application/json'
          }),
          body: JSON.stringify(data)
        });
        const answer = await response.json();
        console.log(answer);
        document.querySelector('.infoMessage').innerText = answer.message;
        document.querySelector('.formOrder').remove();
      }
    )();
  });
</script>
